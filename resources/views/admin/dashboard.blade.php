<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/admin2.css') }}">
</head>
<body>
    <h3>Admin Dashboard</h3>
    <div class="topnav">
    <a href="#home" class="active">home</a> 
    <a href="#view" class="active">view</a> 
    <a href="#admin" class="active">admin</a> 
    <a href="#profile" class="split">profile</a>   
    </div>

    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form><br>
                <br>
                <!-- @if(Auth::guard('admin')->check()) -->
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Create Job</a>
<!-- @endif -->

 <!-- Navigation Links -->
 <div class="mt-4">
        <a href="{{ route('admin.view') }}" class="btn btn-primary">View Users & Companies</a>
    </div>
<br>
<br>
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
</body>
</html>