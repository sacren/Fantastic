<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listings = Listing::where('is_active', true)
            ->with('tags')
            ->latest()
            ->get();

        $tags = Tag::orderBy('name')->get();

        if ($request->has('s')) {
            $query = strtolower($request->get('s'));

            $listings = $listings->filter(fn ($listing) =>
                str_contains(strtolower($listing->title), $query) ||
                str_contains(strtolower($listing->company), $query) ||
                str_contains(strtolower($listing->location), $query)
            );
        }

        if ($request->has('tag')) {
            $tag = $request->get('tag');

            $listings = $listings->filter(fn ($listing) =>
                $listing->tags->contains('slug', $tag)
            );
        }

        return view('listings.index', compact('listings', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
