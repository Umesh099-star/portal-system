@extends('layouts.app')

@section('content')
    <h2>My Applied Jobs</h2>
    <table class="table">
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Applied On</th>
        </tr>
        @foreach($applications as $app)
        <tr>
            <td>{{ $app->job->title }}</td>
            <td>{{ $app->job->company->name }}</td>
            <td>{{ $app->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </table>
@endsection
