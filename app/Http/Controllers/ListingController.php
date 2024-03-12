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

        Listing::create($inputData);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
