@extends('layouts.admin.app')

@section('content')
<div class="container">
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
                <!-- <th>Uploaded By</th> -->
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
                    <!-- <td>{{ $job->admin->name ?? 'Unknown' }}</td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>





</div>
@endsection