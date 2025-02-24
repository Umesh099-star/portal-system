@extends('layouts.app')

@section('content')
    <h2>Apply for {{ $job->title }}</h2>
    
    <form action="{{ route('job.submit', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Upload CV:</label>
        <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
        
        <button type="submit">Submit Application</button>
    </form>
@endsection
