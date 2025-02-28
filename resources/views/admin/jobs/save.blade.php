@extends('layouts.admin.app')

@section('content')

<div class="container">
<link rel="stylesheet" href="{{ asset('css/company/view.css') }}">

    <h2>Job Listings</h2>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach ($jobs as $job)
        <div>
            <h3>{{ $job->title }}</h3>
            <p><strong>Category:</strong> {{ $job->category }}</p>
            <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
            <p><strong>Vacancy:</strong> {{ $job->vacancy }}</p>
            <p><strong>Salary:</strong> ${{ $job->salary }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Description:</strong> {{ $job->description }}</p>
            <p><strong>Qualifications:</strong> {{ $job->qualifications }}</p>
            <p><strong>Experience:</strong> {{ $job->experience }}</p>

            <a href="{{ route('admin.jobs.edit', $job->id) }}">Edit</a>

            <form action="{{ route('admin.jobs.delete', $job->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        <hr>
    @endforeach
</div>

@endsection
