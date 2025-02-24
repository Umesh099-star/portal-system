@extends('layouts.app')

@section('content')
    <h2>Applicants for {{ $job->title }}</h2>

    @foreach ($applications as $application)
        <div>
            <p><strong>Name:</strong> {{ $application->name }}</p>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <a href="{{ asset('storage/' . $application->cv) }}" download>Download CV</a>
        </div>
        <hr>
    @endforeach
@endsection
