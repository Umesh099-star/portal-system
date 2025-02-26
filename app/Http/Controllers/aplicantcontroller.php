<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class aplicantcontroller extends Controller
{
    public function apply(Request $request, $jobId)
    {
        $job = Job::findOrFail($job_id);
    $user = auth()->user();

 // Fetch CV from users_profile table
 $cv = $user->profile ? $user->profile->cv : null;

//  // Debugging
//  dd($user->toArray(), $job->toArray(), $cv, $request->all());

 // Check if CV exists
 if (!$cv) {
     return redirect()->back()->with('error', 'Please upload your CV before applying.');
 }

 // Check if already applied
 if (Application::where('user_id', $user->id)->where('job_id', $jobId)->exists()) {
     return redirect()->back()->with('error', 'You have already applied for this job.');
 }

        // Save application
    Application::create([
        'user_id' => $user->id,
        'job_id' => $jobId,
        'company_id' => $job->company_id,
        'cv' => $cv,
        'cover_letter' => $request->cover_letter
    ]);

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    public function userApplications()
    {
        $applications = Application::where('user_id', Auth::id())->with('job')->get();
        return view('jobseeker.appliedjob', compact('applications'));
    }

    public function companyApplications()
    {
        $applications = Application::whereHas('job', function ($query) {
            $query->where('company_id', Auth::id());
        })->with('user', 'job')->get();

        return view('company.applicant', compact('applications'));
    }
}

