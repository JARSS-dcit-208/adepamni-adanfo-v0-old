@extends('layouts.app')

@section('content')
    <h1>Add New Customer</h1>
    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone" required>
        </div>
        <div>
            <label>Address:</label>
            <textarea name="address" rows="4" required></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
