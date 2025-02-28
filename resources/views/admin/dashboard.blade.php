@extends('layouts.admin.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    
    <div class="job-list-container">
        <h2>Admin Job Listings</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Job Type</th>
                    <th>Vacancy</th>
                    <th>Salary</th>
                    <th>Location</th>
                    <th>Action</th> <!-- Added Action column -->
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->category }}</td>
                        <td>{{ $job->job_type }}</td>
                        <td>{{ $job->vacancy }}</td>
                        <td>{{ $job->salary }}</td>
                        <td>{{ $job->location }}</td>
                        <td>
                            <form action="{{ route('admin.jobs.delete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
