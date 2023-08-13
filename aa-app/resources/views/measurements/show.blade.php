@extends('layouts.app')

@section('content')
<h1>Measurements for {{ $measurement->customer->name }}</h1>

<div>
    <strong>Height:</strong> {{ $measurement->height }} cm
</div>

<div>
    <strong>Weight:</strong> {{ $measurement->weight }} kg
</div>

<div>
    <strong>Bust:</strong> {{ $measurement->bust }} cm
</div>

<div>
    <strong>Waist:</strong> {{ $measurement->waist }} cm
</div>

<div>
    <strong>Hips:</strong> {{ $measurement->hips }} cm
</div>

<div>
    <strong>Back Waist Length:</strong> {{ $measurement->back_waist_length }} cm
</div>

<div>
    <strong>Front Waist Length:</strong> {{ $measurement->front_waist_length }} cm
</div>

<div>
    <strong>Shoulder to Shoulder:</strong> {{ $measurement->shoulder_to_shoulder }} cm
</div>

<div>
    <strong>Chest Depth:</strong> {{ $measurement->chest_depth }} cm
</div>

<div>
    <strong>Armhole Depth:</strong> {{ $measurement->armhole_depth }} cm
</div>

<div>
    <strong>Inseam:</strong> {{ $measurement->inseam }} cm
</div>

<div>
    <strong>Crotch Depth:</strong> {{ $measurement->crotch_depth }} cm
</div>

<div>
    <strong>Neck Circumference:</strong> {{ $measurement->neck_circumference }} cm
</div>

<div>
    <strong>Sleeve Length:</strong> {{ $measurement->sleeve_length }} cm
</div>

<div>
    <strong>Bicep Circumference:</strong> {{ $measurement->bicep_circumference }} cm
</div>

<div>
    <strong>Forearm Circumference:</strong> {{ $measurement->forearm_circumference }} cm
</div>

<div>
    <strong>Thigh Circumference:</strong> {{ $measurement->thigh_circumference }} cm
</div>

<div>
    <strong>Knee Circumference:</strong> {{ $measurement->knee_circumference }} cm
</div>

<div>
    <strong>Calf Circumference:</strong> {{ $measurement->calf_circumference }} cm
</div>

<div>
    <strong>Ankle Circumference:</strong> {{ $measurement->ankle_circumference }} cm
</div>

<a href="{{ route('measurements.edit', $measurement->id) }}">Edit Measurement</a> | 
<a href="{{ route('measurements.index') }}">Back to Measurements List</a>
@endsection
