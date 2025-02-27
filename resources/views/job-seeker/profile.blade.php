@extends('layouts.jobseeker.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/jobseeker/profile.css')}}">
    <h2>Job-Seeker Profile</h2>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('job-seeker.profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $profile->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $profile->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $profile->phone ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="education">Education</label>
            <input type="text" class="form-control" name="education" value="{{ old('education', $profile->education ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="cv">Upload CV</label>
            <input type="file" class="form-control" name="cv">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('job-seeker.profile.view') }}" class="btn btn-info">View</a>
    </form>
</div>
@endsection
