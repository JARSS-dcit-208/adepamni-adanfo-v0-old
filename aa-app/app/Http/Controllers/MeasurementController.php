<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\Customer;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensuring the user is authenticated for all methods
    }

    // Display a listing of the measurements.
    public function index(Request $request)
    {
        $measurements = auth()->user()->measurements;

        if ($request->wantsJson()) {
            return response()->json($measurements);
        }

        return view('measurements.index', ['measurements' => $measurements]);
    }

    // Show the form for creating a new measurement.
    public function create()
    {
        $customers = auth()->user()->customers;
        return view('measurements.create', compact('customers'));
    }

    // Store a newly created measurement in the database.
    public function store(Request $request)
{
    $validatedData = $this->validateRequest($request, 'create');

    // Ensure the customer belongs to the authenticated user
    $customer = Customer::find($validatedData['customer_id']);
    if (!$customer || $customer->user_id !== auth()->id()) {
        return redirect()->route('measurements.index')->with('error', 'Unauthorized access.');
    }

    // Add user_id to the validated data
    $validatedData['user_id'] = auth()->id();

    // Check if a measurement already exists for the customer
    $measurement = Measurement::firstWhere('customer_id', $validatedData['customer_id']);

    if ($measurement) {
        $measurement->update($validatedData);
    } else {
        $measurement = Measurement::create($validatedData);
    }

    if ($request->wantsJson()) {
        return response()->json($measurement, 201);
    }

    return redirect()->route('measurements.index')->with('success', 'Measurement added/updated successfully.');
}

    // Display the specified measurement.
    public function show(Measurement $measurement)
    {
        // Ensure the measurement belongs to the authenticated user
        if ($measurement->user_id !== auth()->id()) {
            return redirect()->route('measurements.index')->with('error', 'Measurement not found or unauthorized access.');
        }

        if (request()->wantsJson()) {
            return response()->json($measurement);
        }

        return view('measurements.show', compact('measurement'));
    }

    // Show the form for editing the specified measurement.
    public function edit($id)
    {
        $measurement = Measurement::find($id);

        // Ensure the measurement belongs to the authenticated user
        if (!$measurement || $measurement->user_id !== auth()->id()) {
            return redirect()->route('measurements.index')->with('error', 'Measurement not found or unauthorized access.');
        }

        $customers = auth()->user()->customers;
        return view('measurements.edit', compact('measurement', 'customers'));
    }

    // Update the specified measurement in the database.
    public function update(Request $request, Measurement $measurement)
    {
        if ($measurement->user_id !== auth()->id()) {
            return redirect()->route('measurements.index')->with('error', 'Unauthorized access.');
        }

        $validatedData = $this->validateRequest($request, 'update');
        $measurement->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($measurement);
        }

        return redirect()->route('measurements.index')->with('success', 'Measurement updated successfully.');
    }

    // Remove the specified measurement from the database.
    public function destroy(Request $request, Measurement $measurement)
    {
        if ($measurement->user_id !== auth()->id()) {
            return redirect()->route('measurements.index')->with('error', 'Unauthorized access.');
        }

        $measurement->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('measurements.index')->with('success', 'Measurement deleted successfully.');
    }

    private function validateRequest($request, $action = 'create')
    {
        $rules = [
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
        ];

        if ($action === 'create') {
            $rules['customer_id'] = 'required|exists:customers,id|unique:measurements,customer_id';
        }

        return $request->validate($rules);
    }
}
