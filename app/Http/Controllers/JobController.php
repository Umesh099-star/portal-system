<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




class JobController extends Controller
{
 // Show job creation form
 public function create()
 {
     return view('company.jobs.create');
 }
 public function save()
 {
     // Get all jobs
     $jobs = Job::latest()->get(); // Fetch jobs from DB
 
     return view('company.jobs.save', compact('jobs'));
 }
 
//  update the data in db
 public function edit($id)
{
    $job = Job::findOrFail($id);
    return view('company.jobs.edit', compact('job'));
}

// to delete the data from db
public function destroy($id)
{
    $job = Job::findOrFail($id);
    if (auth()->user()->id != $job->company_id && Auth::guard('admin')->user()->usertype != 'admin') {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    $job->delete();
    return redirect()->back()->with('success', 'Job deleted successfully.');
}


// to list the data in user Dashboard
public function jobList()
{
   
    // Fetch all jobs from database
    $jobs = Job::with('company')
    ->orderByRaw("CASE WHEN added_by = 'admin' THEN 1 ELSE 2 END")
    ->latest()
    ->get();
   
    return view('dashboard', compact('jobs'));


}

// stores all the info from company into db
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'job_type' => 'required|string',
        'vacancy' => 'required|integer',
        'salary' => 'required|string',
        'location' => 'required|string',
        'description' => 'required|string',
        'qualifications' => 'nullable|string',
        'experience' => 'nullable|string',
    ]);

    $user = auth()->user();
    
    $job = new Job($request->all());
     if ($user->usertype == 'admin') {
        $job->added_by = 'admin';
        $job->reference_id = 'ADM' . time(); // Unique Admin Reference ID
        $job->company_id = $request->company_id; // Associate with existing company
    } else {
        $job->added_by = 'company';
        $job->reference_id = 'CMP' . time(); // Unique Company Reference ID
        $job->company_id = $user->id; // Company ID from authentication
    }

    $job->save();
    return redirect()->back()->with('success', 'Job created successfully.');
}


    // update or rdit the data in the db
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        if (auth()->user()->id != $job->company_id && auth()->user()->role != 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    
        $job->update($request->all());
        return redirect()->back()->with('success', 'Job updated successfully.');
    }
    
 
    // admin listing control view in job-sekkers
    public function jobSeekerDashboard()
{

    $jobs = Job::with('company')
    ->orderByRaw("CASE WHEN added_by = 'admin' THEN 1 ELSE 2 END")
    ->latest()
    ->get();
   

    return view('dashboard', compact('jobs')); // Using default dashboard.blade.php
}


}
