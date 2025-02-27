@extends('layouts.jobseeker.app')

@section('content')
<div class="container">
    <h2>My Profile</h2>

    <p><strong>Name:</strong> {{ $profile->name }}</p>
    <p><strong>Email:</strong> {{ $profile->email }}</p>
    <p><strong>Address:</strong> {{ $profile->address }}</p>
    <p><strong>Phone:</strong> {{ $profile->phone }}</p>
    <p><strong>Education:</strong> {{ $profile->education }}</p>
    
    @if ($profile->cv)
        <p><strong>CV:</strong> <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank">Download CV</a></p>
    @endif

    <a href="{{ route('job-seeker.profile.edit') }}" class="btn btn-warning">Edit Profile</a>
    <form action="{{ route('job-seeker.profile.delete') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Profile</button>
    </form>
</div>
@endsection
