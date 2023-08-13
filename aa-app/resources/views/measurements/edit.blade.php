@extends('layouts.app')

@section('content')
<h1>Edit Measurement for {{ $measurement->customer->name }}</h1>

<form action="{{ route('measurements.update', $measurement->id) }}" method="post">
    @csrf
    @method('PUT')

    <input type="hidden" name="customer_id" value="{{ $measurement->customer_id }}">

    <div>
        <label for="height">Height:</label>
        <input type="number" id="height" name="height" value="{{ $measurement->height }}" step="0.01">
    </div>

    <div>
        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight" value="{{ $measurement->weight }}" step="0.01">
    </div>

    <div>
        <label for="bust">Bust:</label>
        <input type="number" id="bust" name="bust" value="{{ $measurement->bust }}" step="0.01">
    </div>

    <div>
        <label for="waist">Waist:</label>
        <input type="number" id="waist" name="waist" value="{{ $measurement->waist }}" step="0.01">
    </div>

    <div>
        <label for="hips">Hips:</label>
        <input type="number" id="hips" name="hips" value="{{ $measurement->hips }}" step="0.01">
    </div>

    <div>
        <label for="back_waist_length">Back Waist Length:</label>
        <input type="number" id="back_waist_length" name="back_waist_length" value="{{ $measurement->back_waist_length }}" step="0.01">
    </div>

    <div>
        <label for="front_waist_length">Front Waist Length:</label>
        <input type="number" id="front_waist_length" name="front_waist_length" value="{{ $measurement->front_waist_length }}" step="0.01">
    </div>

    <div>
        <label for="shoulder_to_shoulder">Shoulder to Shoulder:</label>
        <input type="number" id="shoulder_to_shoulder" name="shoulder_to_shoulder" value="{{ $measurement->shoulder_to_shoulder }}" step="0.01">
    </div>

    <div>
        <label for="chest_depth">Chest Depth:</label>
        <input type="number" id="chest_depth" name="chest_depth" value="{{ $measurement->chest_depth }}" step="0.01">
    </div>

    <div>
        <label for="armhole_depth">Armhole Depth:</label>
        <input type="number" id="armhole_depth" name="armhole_depth" value="{{ $measurement->armhole_depth }}" step="0.01">
    </div>

    <div>
        <label for="inseam">Inseam:</label>
        <input type="number" id="inseam" name="inseam" value="{{ $measurement->inseam }}" step="0.01">
    </div>

    <div>
        <label for="crotch_depth">Crotch Depth:</label>
        <input type="number" id="crotch_depth" name="crotch_depth" value="{{ $measurement->crotch_depth }}" step="0.01">
    </div>

    <div>
        <label for="neck_circumference">Neck Circumference:</label>
        <input type="number" id="neck_circumference" name="neck_circumference" value="{{ $measurement->neck_circumference }}" step="0.01">
    </div>

    <div>
        <label for="sleeve_length">Sleeve Length:</label>
        <input type="number" id="sleeve_length" name="sleeve_length" value="{{ $measurement->sleeve_length }}" step="0.01">
    </div>

    <div>
        <label for="bicep_circumference">Bicep Circumference:</label>
        <input type="number" id="bicep_circumference" name="bicep_circumference" value="{{ $measurement->bicep_circumference }}" step="0.01">
    </div>

    <div>
        <label for="forearm_circumference">Forearm Circumference:</label>
        <input type="number" id="forearm_circumference" name="forearm_circumference" value="{{ $measurement->forearm_circumference }}" step="0.01">
    </div>

    <div>
        <label for="thigh_circumference">Thigh Circumference:</label>
        <input type="number" id="thigh_circumference" name="thigh_circumference" value="{{ $measurement->thigh_circumference }}" step="0.01">
    </div>

    <div>
        <label for="knee_circumference">Knee Circumference:</label>
        <input type="number" id="knee_circumference" name="knee_circumference" value="{{ $measurement->knee_circumference }}" step="0.01">
    </div>

    <div>
        <label for="calf_circumference">Calf Circumference:</label>
        <input type="number" id="calf_circumference" name="calf_circumference" value="{{ $measurement->calf_circumference }}" step="0.01">
    </div>

    <div>
        <label for="ankle_circumference">Ankle Circumference:</label>
        <input type="number" id="ankle_circumference" name="ankle_circumference" value="{{ $measurement->ankle_circumference }}" step="0.01">
    </div>

    <button type="submit">Update Measurement</button>
</form>

<a href="{{ route('measurements.index') }}">Back to Measurements List</a>
@endsection
