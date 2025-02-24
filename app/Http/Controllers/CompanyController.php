<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    
    public function index()
    {
        return view('company.dashboard');
    }

    public function viewApplicants($job_id)
{
    $job = Job::findOrFail($job_id);
    $applications = Application::where('job_id', $job_id)->get();

    return view('company.applicant', compact('job', 'applications'));
}
}

