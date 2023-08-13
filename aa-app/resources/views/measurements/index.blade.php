@extends('layouts.app')

@section('content')
    <h1>All Measurements</h1>
    <a href="{{ route('measurements.create') }}">Add New Measurement</a>
    <ul>
        @foreach ($measurements as $measurement)
            <li>
                Measurements for: {{ $measurement->customer->name }}
                <a href="{{ route('measurements.show', $measurement->id) }}">View</a> | 
                <a href="{{ route('measurements.edit', $measurement->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
