@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">All Designs</h1>
        <a href="{{ route('designs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add New Design
        </a>
    </div>

    <div class="bg-white shadow-md rounded p-6">
        <ul>
            @forelse ($designs as $design)
                <li class="border-b border-gray-200 pb-2 mb-2 flex items-center">
                    <!-- Thumbnail -->
                    @if($design->photo_path)
                        <img src="{{ asset('storage/'.$design->photo_path) }}" alt="Design Thumbnail" class="w-16 h-16 mr-4 rounded">
                    @endif

                    <div class="flex-1">
                        <span class="font-bold text-lg">{{ $design->title }}</span> 
                        <span class="text-gray-600">(For: {{ $design->customer->name }})</span>
                        <div class="mt-2">
                            <a href="{{ route('designs.show', $design->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">View</a>
                            <a href="{{ route('designs.edit', $design->id) }}" class="text-green-500 hover:text-green-700 mr-4">Edit</a>

                            <!-- Delete Design Link -->
                            <form action="{{ route('designs.destroy', $design->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this design?');">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @empty
                <li class="text-gray-600">No designs available.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
