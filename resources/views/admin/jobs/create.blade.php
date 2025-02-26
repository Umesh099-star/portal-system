@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Job</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Job Type:</label>
            <select name="job_type" class="form-control">
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Remote">Remote</option>
            </select>
        </div>

        <div class="form-group">
            <label>Vacancy:</label>
            <input type="number" name="vacancy" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Salary:</label>
            <input type="text" name="salary" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Qualifications:</label>
            <textarea name="qualifications" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Experience:</label>
            <input type="text" name="experience" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Assign to Company:</label>
            <select name="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>
</div>
@endsection
