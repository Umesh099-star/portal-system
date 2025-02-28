<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role-based Registration</title>
    <link rel="stylesheet" href="{{ asset('css/rolebased.css') }}">
    <style>
        /* Sticky Navbar Styling */
        .button-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #333;
            padding: 10px 0;
            text-align: center;
            z-index: 1000;
        }

        .button-container button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container button:hover {
            background: #0056b3;
        }

        /* Form Container Styling */
        #form-container {
            margin-top: 70px; /* Prevent content from being hidden under the fixed navbar */
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            width: 50%;
            margin: 70px auto 20px;
            min-height: 150px;
            background: #f9f9f9;
            display: none; /* Hide until a form is loaded */
        }
    </style>
</head>
<body>

    <!-- Sticky Button Container (Navbar) -->
    <div class="button-container">
        <button onclick="loadForm('{{ route('register') }}')" class="job-seeker-btn">
            Register as Job Seeker
        </button>
        <button onclick="loadForm('{{ route('company.auth.register') }}')" class="company-btn">
            Register as Company
        </button>
    </div>

    <!-- Single Form Container -->
    <div id="form-container">
        <p>Select an option above to start the registration process.</p>
    </div>

    <!-- JavaScript to Load Forms Dynamically -->
    <script>
        function loadForm(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('form-container').innerHTML = data;
                    document.getElementById('form-container').style.display = 'block'; // Show the form container
                })
                .catch(error => console.error('Error loading form:', error));
        }
    </script>

</body>
</html>
