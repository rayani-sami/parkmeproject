<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('parking')->get();
        $parkings = Parking::all();
        return view('admin.places.index', compact('places','parkings'));
    }

    public function create()
    {
        $parkings = Parking::all();
        return view('admin.places.create', compact('parkings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parking_id' => 'required|exists:parkings,id',
            'number' => 'required|integer|unique:places,number',
            'is_available' => 'required|boolean',
        ]);

        Place::create($request->all());

        return redirect()->route('admin.places.index')->with('success', 'Place added successfully.');
    }

    public function edit(Place $place)
    {
        $parkings = Parking::all();
        return view('admin.places.edit', compact('place', 'parkings'));
    }

    public function update(Request $request, Place $place)
    {
        $request->validate([
            'parking_id' => 'required|exists:parkings,id',
            'number' => 'required|integer|unique:places,number,' . $place->id,
            'is_available' => 'required|boolean',
        ]);

        $place->update($request->all());

        return redirect()->route('admin.places.index')->with('success', 'Place updated successfully.');
    }

       /*********************delete */

       public function delete ($id){


        Place::where('id',$id)->delete();

         $message="Place has been deleted successfully";

         return redirect('admin/places')->with('success_message', $message);
    }
}
