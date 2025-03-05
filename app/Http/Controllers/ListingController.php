<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateList = [
            'title' => 'required',
            'company' => 'required',
            'logo' => 'required|image',
            'location' => 'required',
            'apply_link' => 'required|url',
            'content' => 'required',
            'payment_method_id' => 'required',
        ];

        if (!Auth::check()) {
            $validateList = array_merge($validateList, [
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
                'name' => 'required',
            ]);
        }

        $request->validate($validateList);

        $user = Auth::user();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->createAsStripeCustomer();

            Auth::login($user);
        }

        try {
            $amount = 9999;

            if ($request->filled('is_highlighted')) {
                $amount += 1999;
            }

            $user->charge($amount, $request->payment_method_id);

            $md = new \Parsedown();

            $listing = $user->listings()->create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'company' => $request->company,
                'logo' => basename($request->file('logo')->store('logos', 'public')),
                'location' => $request->location,
                'apply_link' => $request->apply_link,
                'content' => $md->text($request->content),
                'is_highlighted' => $request->filled('is_highlighted'),
                'is_active' => true,
            ]);

            foreach (explode(',', $request->tags) as $requestTag) {
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug(trim($requestTag)),
                ], [
                    'name' => trim($requestTag),
                ]);

                $tag->listings()->attach($listing->tag);
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Apply the specified resource in storage
     */
    public function apply(Listing $listing , Request $request)
    {
        $listing->clicks()->create([
            'user_agent' => $request->userAgent(),
            'ip_address' => $request->ip(),
        ]);

        return redirect()->to($listing->apply_link);
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
