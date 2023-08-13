@extends('layouts.app')

@section('content')
    <h1>All Customers</h1>
    <a href="{{ route('customers.create') }}">Add New Customer</a>
    <ul>
        @foreach ($customers as $customer)
            <li>
                {{ $customer->name }} 
                <a href="{{ route('customers.show', $customer->id) }}">View</a> | 
                <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
