
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
   

    <!-- <link rel="stylesheet" href="company.css"> -->
    <link rel="stylesheet" href="{{ asset('css/company.css') }}">
    
</head>
<body>
    <h3>Company Dashboard</h3>
    <!-- <li><a href="{{ route('company.jobs.create') }}">Create Job</a></li> -->

    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                <!-- navbar-->
                <header>
                    <nav>
                        <ui>
                            <li><a href='#'>dashboard</a></li>
                            <li><a href='#'>profile</a></li>
                            <li><a href="{{ route('company.jobs.create') }}">Create Job</a></li>
                            <li><a href="{{ route('company.jobs.save') }}">View</a></li>
                            <li><a href='#'>setting</a></li>
                        </ui>
                    </nav>
                </header>
                <!-- banner section-->
                <section class ="banner">
                    <div class="banner-text">
                        <h2>keep connecting for job opportunities</h2>
                    </div>
                </section>
     <!-- Dashboard Cards -->
    <section class="dashboard">
        <h2>Dashboard</h2>
        <div class="cards">
            <div class="card orange">
                <p>Running Jobs</p>
                <h1>0</h1>
                <button>View Jobs</button>
            </div>
            <div class="card">
                <p>Pending Jobs</p>
                <h1>0</h1>
                <button>View Jobs</button>
            </div>
            <div class="card">
                <p>Drafted Jobs</p>
                <h1>0</h1>
                <button>View Jobs</button>
            </div>
            <div class="card">
                <p>Expired Jobs</p>
                <h1>0</h1>
                <button>View Jobs</button>
            </div>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="jobs">
        <h2>Running Jobs</h2>
        <table>
            <thead>
                <tr>
                    <th>Job Name</th>
                    <th>Published/Expire Date</th>
                    <th>Job Views</th>
                    <th>Applicants</th>
                    <th>Shortlisted</th>
                    <th>Rejected</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7">No Data Available</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Additional Information -->
    <section class="info">
        <div class="box">Profile Visited <h1>0</h1></div>
        <div class="box">Remaining Job Posts <h1>0</h1></div>
        <div class="box inactive">Resume Database Access <br> INACTIVE</div>
        <div class="box inactive">Featured Company <br> INACTIVE</div>
    </section>

    <!-- Features -->
    <section class="features">
        <h2>Jobejee Features</h2>
        <ul>
            <li>Job Posting Package</li>
            <li>Resume Database Access Package</li>
            <li>Featured Company Package</li>
        </ul>
    </section>

    <!-- Support -->
    <section class="support">
        <h2>For Any Enquiry or Support</h2>
        <p>📞 Call us @ 01-4970596</p>
        <p>📧 support@jobejee.com</p>
    </section>
</body>
</html>