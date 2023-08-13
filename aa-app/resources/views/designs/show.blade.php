@extends('layouts.app')

@section('content')
    <h1>Design Details</h1>
    <p><strong>Title:</strong> {{ $design->title }}</p>
    <p><strong>Customer:</strong> {{ $design->customer->name }}</p>
    @if($design->photo)
        <img src="{{ asset('storage/'.$design->photo) }}" alt="Design Photo">
    @endif
    <a href="{{ route('designs.edit', $design->id) }}">Edit this design</a>
@endsection
