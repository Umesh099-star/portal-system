<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Company</title>
    <link rel="stylesheet" href="{{ asset('css/jobseeker/dashboard.css')}}">
</head>
<body>
    <div class="topnav">
        <a href="{{ url('/') }}" class="active">Home</a>
        <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
        <a href="{{ url()->previous() }}" class="split">Back</a>
    </div>

    <h2>About {{ $company->name }}</h2>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Address:</strong> {{ $company->address }}</p>
    <p><strong>Description:</strong> {{ $company->description }}</p>
    <p><strong>Company Type:</strong> {{ $company->company_type }}</p>

</body>
</html>
