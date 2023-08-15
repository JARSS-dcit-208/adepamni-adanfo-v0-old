<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of the customers.
    public function index(Request $request)
    {
        $customers = auth()->user()->customers;

        if ($request->wantsJson()) {
            return response()->json($customers);
        }

        return view('customers.index', ['customers' => $customers]);
    }

    // Show the form for creating a new customer.
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers',
            'address' => 'required',
        ]);

        $customer = auth()->user()->customers()->create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($customer, 201);
        }

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    // Display the specified customer's details.
    public function show(Request $request, Customer $customer)
    {
        // Ensure that the customer belongs to the authenticated user.
        if ($customer->user_id !== auth()->id()) {
            abort(403, "You don't have permission to view this customer.");
        }

        if ($request->wantsJson()) {
            return response()->json($customer);
        }

        return view('customers.show', ['customer' => $customer]);
    }

    // Show the form for editing the specified customer.
    public function edit(Customer $customer)
    {
        if ($customer->user_id !== auth()->id()) {
            abort(403, "You don't have permission to edit this customer.");
        }

        return view('customers.edit', ['customer' => $customer]);
    }

    // Update the specified customer in the database.
    public function update(Request $request, Customer $customer)
    {
        if ($customer->user_id !== auth()->id()) {
            abort(403, "You don't have permission to update this customer.");
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|unique:customers,phone,' . $customer->id,
            'address' => 'required',
        ]);

        $customer->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($customer);
        }

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified customer from the database.
    public function destroy(Request $request, Customer $customer)
    {
        if ($customer->user_id !== auth()->id()) {
            abort(403, "You don't have permission to delete this customer.");
        }

        $customer->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
