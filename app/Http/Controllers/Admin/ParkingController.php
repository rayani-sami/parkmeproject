<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkingController extends Controller
{
    public function index()
    {
        $parkings = Parking::all();
        return view('admin.parkings.index', compact('parkings'));
    }

    public function create()
    {
        return view('admin.parkings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'total_spaces' => 'required|integer',
            'available_spaces' => 'required|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Parking::create($request->all());

        return redirect()->route('admin.parkings.index')->with('success', 'Parking ajouté avec succès.');
    }

    public function edit(Parking $parking)
    {
        return view('admin.parkings.edit', compact('parking'));
    }

    public function update(Request $request, Parking $parking)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'total_spaces' => 'required|integer',
            'available_spaces' => 'required|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $parking->update($request->all());

        return redirect()->route('admin.parkings.index')->with('success', 'Parking mis à jour avec succès.');
    }

       /*********************delete */

       public function delete ($id){


        Parking::where('id',$id)->delete();

         $message="Parking has been deleted successfully";

         return redirect('admin/parkings')->with('success_message', $message);
    }
}
