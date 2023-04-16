<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $places = Place::with(['categories'])
            ->searchResults()
            ->paginate(9);

        $mapPlaces = $places->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'photos', 'media']);
        $latitude = $places->count() && (request()->filled('category') || request()->filled('search')) ? $places->average('latitude') : -6.97320835;
        $longitude = $places->count() && (request()->filled('category') || request()->filled('search')) ? $places->average('longitude') : 107.63085348184211;

        return view('home', compact('categories', 'places', 'mapPlaces', 'latitude', 'longitude'));
    }

    public function show(Place $place)
    {
        $place->load(['categories']);

        return view('place', compact('place'));
    }
}
