@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Design Details</h1>
        <div>
            <a href="{{ route('designs.edit', $design->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                Edit this design
            </a>

            <!-- Delete Design Form -->
            <form action="{{ route('designs.destroy', $design->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure you want to delete this design?');">
                    Delete Design
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow-md rounded p-6">
        <p class="mb-4"><span class="font-bold">Title:</span> {{ $design->title }}</p>
        <p class="mb-4"><span class="font-bold">Customer:</span> {{ $design->customer->name }}</p>
        
        @if($design->photo_path)
        <div class="mb-4">
            <img src="{{ asset('storage/'.$design->photo_path) }}" alt="Design Photo" class="max-w-full h-auto rounded">
        </div>
        @endif
    </div>
</div>
@endsection
