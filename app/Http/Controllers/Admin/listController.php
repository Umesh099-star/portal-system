<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class listController extends Controller
{

    public function create()
    {
        return view('company.jobs.create');
    }
    // public function create()
    // {
    //     $companies = User::where('usertrype', 'company')->get(); // Get all companies
    //     return view('admin.jobs.create', compact('companies'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'job_type' => 'required',
            'vacancy' => 'required|integer',
            'salary' => 'required',
            'location' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'experience' => 'required',
            'company_id' => 'required|exists:users,id',
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
  
       

    //     Job::create([
    //         'title' => $request->title,
    //         'category' => $request->category,
    //         'job_type' => $request->job_type,
    //         'vacancy' => $request->vacancy,
    //         'salary' => $request->salary,
    //         'location' => $request->location,
    //         'description' => $request->description,
    //         'qualifications' => $request->qualifications,
    //         'experience' => $request->experience,
    //         'added_by' => 'admin',
    //         'company_id' => $request->company_id, // Assign to selected company
    //     ]);
        

    //     return redirect()->route('admin.jobs.create')->with('success', 'Job added successfully.');
    // }
}
}