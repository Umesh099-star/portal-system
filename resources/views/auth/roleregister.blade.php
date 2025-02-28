<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role-based Registration</title>
    <link rel="stylesheet" href="{{ asset('css/rolebased.css') }}">
</head>
<body>

    <!-- Button Container -->
    <div class="button-container">
        <button onclick="loadForm('{{ route('register') }}')" class="job-seeker-btn">
            Register as Job Seeker
        </button>
        <button onclick="loadForm('{{ route('company.auth.register') }}')" class="company-btn">
            Register as Company
        </button>
    </div>

    <!-- Form Container (Dynamically Loaded) -->
    <div id="form-container">
        <p>Please select a registration type above.</p>
    </div>

    <!-- JavaScript to Load Forms Dynamically -->
    <script>
        function loadForm(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('form-container').innerHTML = data;
                })
                .catch(error => console.error('Error loading form:', error));
        }
    </script>

</body>
</html>
