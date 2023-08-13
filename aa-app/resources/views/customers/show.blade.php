@extends('layouts.app')

@section('content')
    <h1>Customer Details</h1>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Phone:</strong> {{ $customer->phone }}</p>
    <p><strong>Address:</strong> {{ $customer->address }}</p>
    <a href="{{ route('customers.edit', $customer->id) }}">Edit this customer</a>
@endsection
