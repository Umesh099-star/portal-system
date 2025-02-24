<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job-seeker</title>
</head>
<body>
    <header>

   
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

@if($jobs->isNotEmpty()) <!-- Check if there are any jobs -->
    @foreach ($jobs as $job)
        <div class="job-listing">
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <a href="{{ route('job.apply', $job->id) }}" class="btn btn-primary">Apply Now</a>
        </div>
    @endforeach
@else
    <p>No jobs available at the moment.</p>
@endif
</body>
</html>