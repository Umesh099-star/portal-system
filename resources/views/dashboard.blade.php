@extends('layouts.jobseeker.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/jobseeker/dashboard.css')}}">

                <h2>Available Jobs</h2>

<!-- admins jobs listing data views from here -->
@foreach($jobs as $job)
    <div class="job-listing">
        <h3>{{ $job->title }}</h3>
        <p><strong>Category:</strong> {{ $job->category }}</p>
        <p><strong>Posted By:</strong> {{ $job->added_by == 'admin' ? 'Admin' : 'Company' }}</p>
        <p><strong>Company:</strong> {{ $job->company ? $job->company->name : 'N/A' }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Salary:</strong> {{ $job->salary }}</p>
        <form action="{{ route('apply.job', ['jobId' => $job->id]) }}" method="POST">
        @csrf
        <button type="submit">Apply Now</button>
    </form>
    </div>
@endforeach









    <!-- Support -->
    <footer>
    <section class="support">
        <h2>For Any Enquiry or Support</h2>
        <p>📞 Call us @ 01-4970596</p>
        <p>📧 support@job.com</p>
    </section>
    </footer>
</div>
@endsection