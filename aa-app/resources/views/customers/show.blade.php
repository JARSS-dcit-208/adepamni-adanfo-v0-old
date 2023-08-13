@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold mb-4">Customer Details</h1>
        
        <div class="bg-white shadow-md rounded p-6 divide-y divide-gray-200">
            <div class="py-2">
                <strong class="text-gray-700">Name:</strong> 
                <span class="ml-2">{{ $customer->name }}</span>
            </div>
            
            <div class="py-2">
                <strong class="text-gray-700">Email:</strong>
                <span class="ml-2">{{ $customer->email }}</span>
            </div>
            
            <div class="py-2">
                <strong class="text-gray-700">Phone:</strong> 
                <span class="ml-2">{{ $customer->phone }}</span>
            </div>
            
            <div class="py-2">
                <strong class="text-gray-700">Address:</strong> 
                <span class="ml-2">{{ $customer->address }}</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit this customer
            </a>
        </div>
    </div>
</div>
@endsection
