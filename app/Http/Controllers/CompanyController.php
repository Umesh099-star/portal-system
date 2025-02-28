<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
class CompanyController extends Controller
{
    
    public function index()
    {
         // Get the currently authenticated company
         $company = Auth::user();

         // Pass the company data to the dashboard view
         return view('company.dashboard', compact('company'));
    }

    public function viewApplicants($job_id)
{
    $job = Job::findOrFail($job_id);
    $applications = Application::where('job_id', $job_id)->get();

    return view('company.applicant', compact('job', 'applications'));
}
public function about($companyId)
{
    $company = CompanyProfile::where('id', $companyId)->first();

    if (!$company) {
        return redirect()->back()->with('error', 'Company not found.');
    }

    return view('about', compact('company'));
}



}

