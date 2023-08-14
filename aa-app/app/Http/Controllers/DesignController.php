<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  // Ensure to include the Storage facade

class DesignController extends Controller
{
    public function index(Request $request)
    {
        $designs = Design::all();

        if ($request->wantsJson()) {
            return response()->json($designs);
        }

        return view('designs.index', ['designs' => $designs]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('designs.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required|string|max:500',
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $filePath = $request->file('photo_path')->store('designs', 'public');
            $validatedData['photo_path'] = $filePath;
        }

        $design = Design::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($design, 201);
        }

        return redirect()->route('designs.index')->with('success', 'Design added successfully.');
    }

    public function show(Request $request, Design $design)
    {
        if ($request->wantsJson()) {
            return response()->json($design);
        }

        return view('designs.show', ['design' => $design]);
    }

    public function edit(Design $design)
{
    $customers = Customer::all();
    return view('designs.edit', ['design' => $design, 'customers' => $customers]);
}


    public function update(Request $request, Design $design)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required|string|max:500',
            'photo_path' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            // Delete old photo if it exists
            if ($design->photo_path) {
                Storage::disk('public')->delete($design->photo_path);
            }

            $filePath = $request->file('photo_path')->store('designs', 'public');
            $validatedData['photo_path'] = $filePath;
        }

        $design->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($design);
        }

        return redirect()->route('designs.index')->with('success', 'Design updated successfully.');
    }

    public function destroy(Request $request, Design $design)
{
    // Delete the associated image from storage
    if ($design->photo_path) {
        Storage::disk('public')->delete($design->photo_path);
    }

    // Delete the design from the database
    $design->delete();

    if ($request->wantsJson()) {
        return response()->json(null, 204);
    }

    return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
}
}
