<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
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
    $job = Job::findOrFail($id); // get job data by ID
    $job->delete(); // Delete the job using same id

    return redirect()->route('company.jobs.save')->with('success', 'Job deleted successfully!');
}

// to list the data in user Dashboard
public function jobList()
{
    $jobs = Job::all(); // Fetch all jobs from database
    return view('dashboard', compact('jobs'));
}

// stores all the info from company into db
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'vacancy' => 'required|integer|min:1',
            'salary' => 'nullable|numeric',
            'location' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'experience' => 'required',
        ]);
        $job = Job::create($request->all());

    // Redirect to the 'save' route after saving
    return redirect()->route('company.jobs.save')->with('success', 'Job created successfully!');
        //  Job::create($request->all());
    
        // return redirect()->route('company.jobs.save')}
    }

    // update or rdit the data in the db
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'vacancy' => 'required|integer|min:1',
            'salary' => 'nullable|numeric',
            'location' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'experience' => 'required',
        ]);
    
        $job = Job::findOrFail($id);
        $job->update($request->all());
    
         return redirect()->route('company.jobs.save')->with('success', 'Job updated successfully.');
    }
    
}
