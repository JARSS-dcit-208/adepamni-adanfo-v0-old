@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <h1 class="text-2xl font-semibold mb-6">Add New Design</h1>
    
    <form action="{{ route('designs.store') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
        @csrf
        
        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <!-- Customer Select -->
        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700 font-bold mb-2">Customer:</label>
            <select name="customer_id" id="customer_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Design Photo Input -->
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-bold mb-2">Design Photo:</label>
            <input type="file" name="photo" id="photo" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
