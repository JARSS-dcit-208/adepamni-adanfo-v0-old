@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">All Measurements</h1>
        <a href="{{ route('measurements.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add New Measurement
        </a>
    </div>

    <ul class="bg-white shadow-md rounded divide-y divide-gray-200">
        @foreach ($measurements as $measurement)
            <li class="px-6 py-4 hover:bg-gray-50">
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 font-medium">Measurements for: {{ $measurement->customer->name }}</span>
                    <div class="flex space-x-4">
                        <a href="{{ route('measurements.show', $measurement->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('measurements.edit', $measurement->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <!-- DELETE Button with Confirmation -->
                        <form action="{{ route('measurements.destroy', $measurement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this measurement?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
