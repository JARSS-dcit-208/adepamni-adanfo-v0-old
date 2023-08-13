<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\Customer; // Import the Customer model
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    // Display a listing of the measurements.
    public function index(Request $request)
    {
        $measurements = Measurement::all();

        if ($request->wantsJson()) {
            return response()->json($measurements);
        }

        return view('measurements.index', ['measurements' => $measurements]);
    }

    // Show the form for creating a new measurement.
    public function create()
    {
        $customers = Customer::all(); // Fetch all customers
        return view('measurements.create', compact('customers'));
    }

    // Store a newly created measurement in the database.
    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);
        $measurement = Measurement::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($measurement, 201);
        }

        return redirect()->route('measurements.index')->with('success', 'Measurement added successfully.');
    }

    public function update(Request $request, Measurement $measurement)
    {
        $validatedData = $this->validateRequest($request);
        $measurement->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($measurement);
        }

        return redirect()->route('measurements.index')->with('success', 'Measurement updated successfully.');
    }

    // Remove the specified measurement from the database.
    public function destroy(Request $request, Measurement $measurement)
    {
        $measurement->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('measurements.index')->with('success', 'Measurement deleted successfully.');
    }

    private function validateRequest($request)
    {
        return $request->validate([
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
    }
}
