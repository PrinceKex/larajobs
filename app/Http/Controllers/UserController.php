<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Show Register / Create Form
    public  function create(){
      return view('users.register');
    }

    // Create New User
    public function store(Request $request){
      $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')], 'password' => ['required| confirmed|min:6']
      ]);

      // Hash Password
      $formFields['password'] = bcrypt($formFields['password']);

      // Create User
      $user = User::create($formFields);

      // Login
      auth()->Login($user);

      return redirect('/')->with('message', 'User created and logged in');
      
    }

    // logout user
    public function logout(Request $request){
      auth()->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/')->with('message', 'You have een logged out');
    }
}
