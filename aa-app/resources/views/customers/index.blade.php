@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">All Customers</h1>
        <a href="{{ route('customers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add New Customer
        </a>
    </div>

    <ul class="bg-white shadow-md rounded divide-y divide-gray-200">
        @foreach ($customers as $customer)
            <li class="px-6 py-4 hover:bg-gray-50">
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 font-medium">
                        {{ $customer->name }}
                        @if(!is_null($customer->measurement))
                            <span class="ml-2 inline-block bg-green-200 text-green-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">Has Measurements</span>
                        @endif
                    </span>
                    <div class="flex space-x-4">
                        <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        
                        <!-- Conditionally display the Add/Edit Measurement link -->
                        @if(is_null($customer->measurement))
                            <a href="{{ route('measurements.create') }}" class="text-green-500 hover:underline">Add Measurement</a>
                        @else
                            <a href="{{ route('measurements.edit', $customer->measurement->id) }}" class="text-green-500 hover:underline">Edit Measurement</a>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
