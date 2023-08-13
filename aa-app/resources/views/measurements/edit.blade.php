@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-1/2 md:w-3/4 sm:w-full">
    <h1 class="text-2xl mb-6 font-semibold text-center">Edit Measurement for {{ $measurement->customer->name }}</h1>
    
    <form action="{{ route('measurements.update', $measurement->id) }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <input type="hidden" name="customer_id" value="{{ $measurement->customer_id }}">

        @foreach(['height', 'weight', 'bust', 'waist', 'hips', 'back_waist_length', 'front_waist_length', 'shoulder_to_shoulder', 'chest_depth', 'armhole_depth', 'inseam', 'crotch_depth', 'neck_circumference', 'sleeve_length', 'bicep_circumference', 'forearm_circumference', 'thigh_circumference', 'knee_circumference', 'calf_circumference', 'ankle_circumference'] as $field)
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $field }}">
                @php 
                // Convert snake_case to Title Case for labels
                $label = ucwords(str_replace('_', ' ', $field));
                echo $label;
                @endphp
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="{{ $field }}" name="{{ $field }}" value="{{ $measurement->$field }}" step="0.01">
        </div>
        @endforeach

        <div class="flex items-center justify-center mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Measurement</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="{{ route('measurements.index') }}" class="text-blue-500 hover:underline">Back to Measurements List</a>
    </div>
</div>
@endsection
