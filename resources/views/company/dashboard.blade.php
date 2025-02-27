@extends('layouts.company.app')

@section('content')
<div class="container">


    <!-- <link rel="stylesheet" href="company.css"> -->
    <link rel="stylesheet" href="{{ asset('css/company.css') }}">
    

    <!-- <h3>Company Dashboard</h3> -->

                <!-- navbar-->
                
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