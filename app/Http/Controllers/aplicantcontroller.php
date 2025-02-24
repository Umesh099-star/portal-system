<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

use Illuminate\Support\Facades\Mail;

class aplicantcontroller extends Controller
{
    public function showApplyForm($id)
    {
        $job = Job::findOrFail($id);
        return view('apply', compact('job'));
    }

    public function submitApplication(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store CV in storage
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Save application data in the database
        $application = new Application();
        $application->job_id = $id;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->cv = $cvPath;
        $application->save();

        // Send email to the company
        $job = Job::findOrFail($id);
        Mail::send('emails.application', ['job' => $job, 'application' => $application], function ($message) use ($job) {
            $message->to($job->company->email)
                    ->subject('New Job Application');
        });

        // return redirect()->route('dashboard')->with('success', 'Application submitted successfully!');
    }
}
