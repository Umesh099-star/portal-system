

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Job</h2>
    <form action="{{ route('company.jobs.store') }}" method="POST">
        @csrf

        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Category:</label>
        <input type="text" name="category" required><br>

        <label>Job Type:</label>
        <select name="job_type" required>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Freelance">Freelance</option>
        </select><br>

        <label>Vacancy:</label>
        <input type="number" name="vacancy" min="1" required><br>

        <label>Salary:</label>
        <input type="number" name="salary"><br>

        <label>Location:</label>
        <input type="text" name="location" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>

        <label>Qualifications:</label>
        <textarea name="qualifications" required></textarea><br>

        <label>Experience:</label>
        <input type="text" name="experience" required><br>

        <button type="submit">Create Job</button>
    </form>
</div>
@endsection
