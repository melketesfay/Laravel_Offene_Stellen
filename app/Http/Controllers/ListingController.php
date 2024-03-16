<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{


    // Show all Listings

    public function index()
    {


        return view('listings.index', ['topics' => Listing::latest()->filter(request(['tag', 'search']))->paginate(3)]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listItem' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {


        $inputData = $request->validate([
            'title' => 'required',

            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $inputData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $inputData['user_id'] = auth()->id();

        Listing::create($inputData);

        return redirect('/')->with('message', 'Listing created successfully!');
    }



    // Show Edit form
    public function edit(Listing $listing, Request $request)
    {
        // dd($request, request());
        // dd($listing->path);
        // dd(request());
        return view('listings.edit', ['listItem' => $listing]);
    }


    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // make sure that logged in user is owner

        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $inputData = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $inputData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($inputData);

        return redirect('/listings/' . $listing->id);
    }


    // Delete Listing


    public function destroy(Listing $listing)
    {
        // make sure that logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Item deleted successfully');
    }


    // Manage Listing

    public function manage(Listing $listings)
    {
        return view('listings.manage', ['listings' =>  auth()->user()->listings()->get()]);
    }
}
