@extends('layouts.company.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/company/applicant.css') }}">

    <h2>Job Applications</h2>

    @if($applications->isEmpty())
        <p>No one has applied for the job, or no job listings have been created yet.</p>
    @else
        @foreach($applications as $application)
            <div class="application-list">
                <h3>Applied Job: {{ optional($application->job)->title ?? 'N/A' }}</h3>
                <p><strong>Category:</strong> {{ optional($application->job)->category ?? 'N/A' }}</p>
                <p><strong>Job ID:</strong> {{ $application->job_id }}</p> 
                <p><strong>Job-Seeker:</strong> {{ optional($application->user)->name ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ optional($application->user)->email ?? 'N/A' }}</p>

                @if($application->cv)
                    <p><strong>CV:</strong> 
                        <a href="{{ asset('storage/cvs/' . $application->cv) }}" download>Download CV</a>
                    </p>
                @else
                    <p><strong>CV:</strong> Not Available</p>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
