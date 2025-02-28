@extends('layouts.admin.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
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
