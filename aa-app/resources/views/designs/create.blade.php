@extends('layouts.app')

@section('content')
    <h1>Add New Design</h1>
    <form action="{{ route('designs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Customer:</label>
            <select name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Design Photo:</label>
            <input type="file" name="photo">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
