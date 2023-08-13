@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 lg:w-2/3 md:w-3/4 sm:w-full">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold mb-4">Measurements for {{ $measurement->customer->name }}</h1>
        
        <div class="bg-white shadow-md rounded p-6 divide-y divide-gray-200">
            @php
                $data = [
                    'Height' => $measurement->height . ' cm',
                    'Weight' => $measurement->weight . ' kg',
                    'Bust' => $measurement->bust . ' cm',
                    'Waist' => $measurement->waist . ' cm',
                    'Hips' => $measurement->hips . ' cm',
                    'Back Waist Length' => $measurement->back_waist_length . ' cm',
                    'Front Waist Length' => $measurement->front_waist_length . ' cm',
                    'Shoulder to Shoulder' => $measurement->shoulder_to_shoulder . ' cm',
                    'Chest Depth' => $measurement->chest_depth . ' cm',
                    'Armhole Depth' => $measurement->armhole_depth . ' cm',
                    'Inseam' => $measurement->inseam . ' cm',
                    'Crotch Depth' => $measurement->crotch_depth . ' cm',
                    'Neck Circumference' => $measurement->neck_circumference . ' cm',
                    'Sleeve Length' => $measurement->sleeve_length . ' cm',
                    'Bicep Circumference' => $measurement->bicep_circumference . ' cm',
                    'Forearm Circumference' => $measurement->forearm_circumference . ' cm',
                    'Thigh Circumference' => $measurement->thigh_circumference . ' cm',
                    'Knee Circumference' => $measurement->knee_circumference . ' cm',
                    'Calf Circumference' => $measurement->calf_circumference . ' cm',
                    'Ankle Circumference' => $measurement->ankle_circumference . ' cm'
                ];
            @endphp

            @foreach($data as $key => $value)
            <div class="py-2">
                <strong class="text-gray-700">{{ $key }}:</strong>
                <span class="ml-2">{{ $value }}</span>
            </div>
            @endforeach
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('measurements.edit', $measurement->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit Measurement
            </a>
            <a href="{{ route('measurements.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to Measurements List
            </a>
        </div>
    </div>
</div>
@endsection
