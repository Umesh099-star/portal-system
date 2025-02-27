{{-- profile.blade.php --}}
@extends('layouts.company.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/company/profile.css') }}">

<div class="container">
    <h2>Create Company Profile</h2>

    <form action="{{ route('company.profile.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Company Name</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" name="address">
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description"></textarea>
        </div>

        <button type="submit">Create Profile</button>
    </form>
</div>

@endsection
