<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    // Display a listing of the designs.
    public function index(Request $request)
    {
        $designs = Design::all();

        if ($request->wantsJson()) {
            return response()->json($designs);
        }

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $design = Design::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($design, 201);
        }

        return redirect()->route('designs.index')->with('success', 'Design added successfully.');
    }

    // Display the specified design's details.
    public function show(Request $request, Design $design)
    {
        if ($request->wantsJson()) {
            return response()->json($design);
        }

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
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $design->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($design);
        }

        return redirect()->route('designs.index')->with('success', 'Design updated successfully.');
    }

    // Remove the specified design from the database.
    public function destroy(Request $request, Design $design)
    {
        $design->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
    }
}
