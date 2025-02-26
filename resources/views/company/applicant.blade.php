<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant received</title>
</head>
<body>
@foreach($applications as $application)
    <div class="application">
        <h3>Applied Job: {{ $application->job->title }}</h3>
        <p><strong>Applicant:</strong> {{ $application->jobSeeker->name }}</p>
        <p><strong>Email:</strong> {{ $application->jobSeeker->email }}</p>
    </div>
@endforeach

</body>
</html>