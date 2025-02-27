@extends('layouts.company.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/company/view.css') }}">

<div class="container">
    <h2>Job Listings</h2>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @php
        // Get the authenticated company ID
        $companyId = auth()->user()->id;
        // Filter jobs to check if any belong to the logged-in company
        $companyJobs = $jobs->where('company_id', $companyId);
    @endphp

    @if ($companyJobs->isEmpty())
        <p class="no-jobs">No job listings have been posted yet.</p>
    @else
        @foreach ($companyJobs as $job)
            <div class="job-card">
                <h3>{{ $job->title }}</h3>
                <p><strong>Category:</strong> {{ $job->category }}</p>
                <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                <p><strong>Vacancy:</strong> {{ $job->vacancy }}</p>
                <p><strong>Salary:</strong> ${{ $job->salary }}</p>
                <p><strong>Location:</strong> {{ $job->location }}</p>
                <p><strong>Description:</strong> {{ $job->description }}</p>
                <p><strong>Qualifications:</strong> {{ $job->qualifications }}</p>
                <p><strong>Experience:</strong> {{ $job->experience }}</p>

                <a href="{{ route('company.jobs.edit', $job->id) }}" class="edit-button">Edit</a>

                <form action="{{ route('company.jobs.delete', $job->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    @endif
</div>

@endsection
