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
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
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
      //($request->file('logo'))
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

      if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
      }

      Listing::create($formFields);

      // Session::flash('message', 'Listing Created');

      return redirect('/')->with('message', 'Listing created successfully');
    }
  
  // Show Edit Form
  public function edit(Listing $listing){
    dd($listing);
    return view('listings.edit', ['listing' => $listing]);
  }

  // Update Listing Data
   public function update(Request $request, Listing $listing){
      //($request->file('logo'))
      // dd($request->all);
      $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required',],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required',
      ]);

      if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
      }

      $listing->update($formFields);

      // Session::flash('message', 'Listing Created');

      return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing){
      $listing->delete();
      return redirect('/')->with('message', 'Listing deleted successfully');
    }
}



