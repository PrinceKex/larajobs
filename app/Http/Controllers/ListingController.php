<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    // show all listings
    public function index(Request $request){
      // dd(request('tag'));
      return view('listings.index', [      
      // 'listings' => Listing::all();
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
      ]);
    }   

     // show single listing
    public function show(Listing $listing){
      return view('listings.show', [
        'listing' => $listing
      ]);
    }

    // show create form
    public function create(){
      return view('listings.create');
    }

    // store Listing Data
    public function store(Request $request){
      // dd($request->all);
      $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule:: unique('listings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required',
      ]);

      Listing::create($formFields);

      // Session::flash('message', 'Listing Created');

      return redirect('/')->with('message', 'Listing created successfully');
    }    
}
