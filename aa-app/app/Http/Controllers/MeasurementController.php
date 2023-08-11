<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    // Display a listing of the measurements.
    public function index()
    {
        $measurements = Measurement::all();
        return view('measurements.index', ['measurements' => $measurements]);
    }

    // Show the form for creating a new measurement.
    public function create()
    {
        return view('measurements.create');
    }

    // Store a newly created measurement in the database.
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'height' => 'required|numeric',
        'weight' => 'nullable|numeric',
        'bust' => 'nullable|numeric',
        'waist' => 'nullable|numeric',
        'hips' => 'nullable|numeric',
        'back_waist_length' => 'nullable|numeric',
        'front_waist_length' => 'nullable|numeric',
        'shoulder_to_shoulder' => 'nullable|numeric',
        'chest_depth' => 'nullable|numeric',
        'armhole_depth' => 'nullable|numeric',
        'inseam' => 'nullable|numeric',
        'crotch_depth' => 'nullable|numeric',
        'neck_circumference' => 'nullable|numeric',
        'sleeve_length' => 'nullable|numeric',
        'bicep_circumference' => 'nullable|numeric',
        'forearm_circumference' => 'nullable|numeric',
        'thigh_circumference' => 'nullable|numeric',
        'knee_circumference' => 'nullable|numeric',
        'calf_circumference' => 'nullable|numeric',
        'ankle_circumference' => 'nullable|numeric',
    ]);

    $measurement = Measurement::create($validatedData);
    return redirect()->route('measurements.index')->with('success', 'Measurement added successfully.');
}

public function update(Request $request, Measurement $measurement)
{
    $validatedData = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'height' => 'required|numeric',
        'weight' => 'nullable|numeric',
        'bust' => 'nullable|numeric',
        'waist' => 'nullable|numeric',
        'hips' => 'nullable|numeric',
        'back_waist_length' => 'nullable|numeric',
        'front_waist_length' => 'nullable|numeric',
        'shoulder_to_shoulder' => 'nullable|numeric',
        'chest_depth' => 'nullable|numeric',
        'armhole_depth' => 'nullable|numeric',
        'inseam' => 'nullable|numeric',
        'crotch_depth' => 'nullable|numeric',
        'neck_circumference' => 'nullable|numeric',
        'sleeve_length' => 'nullable|numeric',
        'bicep_circumference' => 'nullable|numeric',
        'forearm_circumference' => 'nullable|numeric',
        'thigh_circumference' => 'nullable|numeric',
        'knee_circumference' => 'nullable|numeric',
        'calf_circumference' => 'nullable|numeric',
        'ankle_circumference' => 'nullable|numeric',
    ]);

    $measurement->update($validatedData);
    return redirect()->route('measurements.index')->with('success', 'Measurement updated successfully.');
}


    // Remove the specified measurement from the database.
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();
        return redirect()->route('measurements.index')->with('success', 'Measurement deleted successfully.');
    }
}
