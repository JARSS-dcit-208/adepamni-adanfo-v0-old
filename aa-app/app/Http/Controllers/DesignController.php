<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    // Display a listing of the designs.
    public function index()
    {
        $designs = Design::all();
        return view('designs.index', ['designs' => $designs]);
    }

    // Show the form for creating a new design.
    public function create()
    {
        return view('designs.create');
    }

    // Store a newly created design in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            // Additional validation for other fields related to design.
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $design = Design::create($validatedData);
        return redirect()->route('designs.index')->with('success', 'Design added successfully.');
    }

    // Display the specified design's details.
    public function show(Design $design)
    {
        return view('designs.show', ['design' => $design]);
    }

    // Show the form for editing the specified design.
    public function edit(Design $design)
    {
        return view('designs.edit', ['design' => $design]);
    }

    // Update the specified design in the database.
    public function update(Request $request, Design $design)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            // Additional validation for other fields related to design.
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $design->update($validatedData);
        return redirect()->route('designs.index')->with('success', 'Design updated successfully.');
    }

    // Remove the specified design from the database.
    public function destroy(Design $design)
    {
        $design->delete();
        return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
    }
}
