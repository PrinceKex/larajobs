<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register / Create Form
    public  function create(){
      return view('users.register');
    }
}
