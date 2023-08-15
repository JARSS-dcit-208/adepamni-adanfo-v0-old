<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    public function index(Request $request)
    {
        $designs = auth()->user()->designs;

        if ($request->wantsJson()) {
            return response()->json($designs);
        }

        return view('designs.index', ['designs' => $designs]);
    }

    public function create()
    {
        $customers = auth()->user()->customers;
        return view('designs.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => [
                'required',
                Rule::exists('customers', 'id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'description' => 'required|string|max:500',
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $filePath = $request->file('photo_path')->store('designs', 'public');
            $validatedData['photo_path'] = $filePath;
        }

        $design = auth()->user()->designs()->create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($design, 201);
        }

        return redirect()->route('designs.index')->with('success', 'Design added successfully.');
    }

    public function show(Request $request, Design $design)
    {
        if ($design->user_id !== auth()->id()) {
            abort(403, "You don't have permission to view this design.");
        }

        if ($request->wantsJson()) {
            return response()->json($design);
        }

        return view('designs.show', ['design' => $design]);
    }

    public function edit(Design $design)
    {
        if ($design->user_id !== auth()->id()) {
            abort(403, "You don't have permission to edit this design.");
        }

        $customers = auth()->user()->customers;
        return view('designs.edit', ['design' => $design, 'customers' => $customers]);
    }

    public function update(Request $request, Design $design)
    {
        if ($design->user_id !== auth()->id()) {
            abort(403, "You don't have permission to update this design.");
        }

        $validatedData = $request->validate([
            'customer_id' => [
                'required',
                Rule::exists('customers', 'id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'description' => 'required|string|max:500',
            'photo_path' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
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
        if ($design->user_id !== auth()->id()) {
            abort(403, "You don't have permission to delete this design.");
        }

        if ($design->photo_path) {
            Storage::disk('public')->delete($design->photo_path);
        }

        $design->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
    }
}
