@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $customer->name }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" required>
        </div>
        <div>
            <label>Address:</label>
            <textarea name="address" rows="4" required>{{ $customer->address }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
