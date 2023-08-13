@extends('layouts.app')

@section('content')
    <h1>All Designs</h1>
    <a href="{{ route('designs.create') }}">Add New Design</a>
    <ul>
        @foreach ($designs as $design)
            <li>
                {{ $design->title }} (For: {{ $design->customer->name }})
                <a href="{{ route('designs.show', $design->id) }}">View</a> | 
                <a href="{{ route('designs.edit', $design->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
