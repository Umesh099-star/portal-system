@extends('layouts.company.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/company/edit.css') }}">
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
        <div class="mb-4">
        <label>Experience:</label>
                            <select name="experience" id="experience" class="form-control">
                                <option value="">Select Experience</option>
                                <option value="1" {{ (Request::get('experience') == 1) ? 'selected' : '' }}>1 Year</option>
                                <option value="2" {{ (Request::get('experience') == 2) ? 'selected' : '' }}>2 Years</option>
                                <option value="3" {{ (Request::get('experience') == 3) ? 'selected' : '' }}>3 Years</option>
                                <option value="4" {{ (Request::get('experience') == 4) ? 'selected' : '' }}>4 Years</option>
                                <option value="5" {{ (Request::get('experience') == 5) ? 'selected' : '' }}>5 Years</option>
                                <option value="6" {{ (Request::get('experience') == 6) ? 'selected' : '' }}>6 Years</option>
                                <option value="7" {{ (Request::get('experience') == 7) ? 'selected' : '' }}>7 Years</option>
                                <option value="8" {{ (Request::get('experience') == 8) ? 'selected' : '' }}>8 Years</option>
                                <option value="9" {{ (Request::get('experience') == 9) ? 'selected' : '' }}>9 Years</option>
                                <option value="10" {{ (Request::get('experience') == 10) ? 'selected' : '' }}>10 Years</option>
                                <option value="10_plus" {{ (Request::get('experience') == '10_plus') ? 'selected' : '' }}>10+ Years</option>
                            </select>
                        </div>

        <button type="submit">Update Job</button>
    </form>
</div>
@endsection
