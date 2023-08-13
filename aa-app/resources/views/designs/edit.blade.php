@extends('layouts.app')

@section('content')
    <h1>Edit Design</h1>
    <form action="{{ route('designs.update', $design->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ $design->title }}" required>
        </div>
        <div>
            <label>Customer:</label>
            <select name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $design->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Design Photo:</label>
            @if($design->photo)
                <img src="{{ asset('storage/'.$design->photo) }}" alt="Design Photo">
            @endif
            <input type="file" name="photo">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
