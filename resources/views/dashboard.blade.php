<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job-seeker</title>
</head>
<body>
    <header>
    <li><a href="{{ route('job-seeker.profile') }}">My Profile</a></li>

   
<form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                </header>
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
       
    </div>
@endforeach

</body>
</html>