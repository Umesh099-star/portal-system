{{-- settings.blade.php --}}
@extends('layouts.company.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/company/setting.css') }}">

<div class="container">
    <h2>Company Settings</h2>

    @if ($companyProfile)
        <p>Name: {{ $companyProfile->name }}</p>
        <p>Email: {{ $companyProfile->email }}</p>
        <p>Address: {{ $companyProfile->address }}</p>
        <p>Phone: {{ $companyProfile->phone }}</p>
        <p>Description: {{ $companyProfile->description }}</p>

        <form action="{{ route('company.setting.update') }}" method="POST">
            @csrf
            @method('PUT')  <!--  this line to specify the PUT method which db accept-->
    
            <div>
                <label for="name">Company Name</label>
                <input type="text" name="name" value="{{ $companyProfile->name }}" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $companyProfile->email }}" required>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $companyProfile->address }}">
            </div>

            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="{{ $companyProfile->phone }}">
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description">{{ $companyProfile->description }}</textarea>
            </div>

            <button type="submit">Update Profile</button>
        </form>

        <form action="{{ route('company.setting.delete') }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
        </form>

    @else
        <p>No profile found. Please <a href="{{ route('company.profile.create') }}">create your profile</a>.</p>
    @endif
</div>

@endsection
