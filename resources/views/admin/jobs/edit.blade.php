@extends('layouts.admin.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
    <h2>Edit Job</h2>
    <form action="{{ route('company.jobs.update', $job->id) }}" method="POST">
        @csrf

        <label>Title:</label>
        <input type="text" name="title" value="{{ $job->title }}" required><br>

        <label>Category:</label>
        <input type="text" name="category" value="{{ $job->category }}" required><br>

        <label>Job Type:</label>
        <select name="job_type" required>
            <option value="Full-Time" {{ $job->job_type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
            <option value="Part-Time" {{ $job->job_type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
            <option value="Freelance" {{ $job->job_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
        </select><br>

        <label>Vacancy:</label>
        <input type="number" name="vacancy" value="{{ $job->vacancy }}" required><br>

        <label>Salary:</label>
        <input type="number" name="salary" value="{{ $job->salary }}"><br>

        <label>Location:</label>
        <input type="text" name="location" value="{{ $job->location }}" required><br>

        <label>Description:</label>
        <textarea name="description" required>{{ $job->description }}</textarea><br>

        <label>Qualifications:</label>
        <textarea name="qualifications" required>{{ $job->qualifications }}</textarea><br>

        <label>Experience:</label>
        <input type="text" name="experience" value="{{ $job->experience }}" required><br>

        <button type="submit">Update Job</button>
    </form>
</div>
@endsection
