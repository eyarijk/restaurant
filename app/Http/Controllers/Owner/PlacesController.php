<?php

namespace App\Http\Controllers\Owner;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('owner.places.index',compact('places'));
    }

    public function create()
    {
        return view('owner.places.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path() . '/images/places/';
            $filename = time() . '.' . $file->getClientOriginalExtension() ?: 'png';
            $request->file('logo')->move($destinationPath, $filename);
        }

        $place = new Place();
        $place->name = $request->name;
        $place->description = $request->description;
        $place->logo = $filename ? $filename : null;
        $place->phone = $request->phone;
        $place->address = $request->address;
        $place->slug = str_slug($request->name);
        $place->save();

        return redirect()->route('owner.places.index');
    }
}
