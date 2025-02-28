<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Job;
class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
   

    public function create()
    {
        // Debugging: Check if the admin is authenticated
        if (!Auth::guard('admin')->check()) {
            dd('Not Authenticated as Admin');
        }
    
        $admin = Auth::guard('admin')->user();
        // dd($admin); // This should output admin details
    // Fetch the list of companies (if needed for selection, etc.)
    $companies = User::where('usertype', 'company')->get();
    // Debug to check if companies data is retrieved correctly
    

    return view('admin.jobs.create', compact('companies'));
    }
    // views users
    public function viewUsers()
    {
        // Fetch job-seekers (where usertype is 'jobseeker') and companies (where usertype is 'company')
        $users = User::where('usertype', 'user')->get();
        $companies = User::where('usertype', 'company')->get();
        
        return view('admin.view', compact('users', 'companies'));
    }

    public function deleteUser($id)
    {
        // Find and delete job-seeker (user with usertype 'jobseeker')
        $user = User::findOrFail($id);
        if ($user->usertype === 'user') {
            $user->delete();
            return redirect()->route('admin.view')->with('success', 'Job-seeker deleted successfully.');
        }
        return redirect()->route('admin.view')->with('error', 'Invalid user type.');
    }

    public function deleteCompany($id)
    {
        // Find and delete company (user with usertype 'company')
        $company = User::findOrFail($id);
        if ($company->usertype === 'company') {
            $company->delete();
            return redirect()->route('admin.view')->with('success', 'Company deleted successfully.');
        }
        return redirect()->route('admin.view')->with('error', 'Invalid user type.');
    }


    public function index()
    {
        if (Job::where('added_by', 'admin')->exists()) {
            // Fetch jobs only if they were added by admins
            $jobs = Job::where('added_by', 'admin')->get();
        } else {
            // If no jobs are added by admins, set an empty collection
            $jobs = collect(); // Empty collection to avoid errors in the view
        }
        return view('admin.dashboard', compact('jobs'));
    }

    public function jobSeekerDashboard()
    {
    
        $jobs = Job::with('company')
        ->orderByRaw("CASE WHEN added_by = 'admin' THEN 1 ELSE 2 END")
        ->latest()
        ->get();
       
    
        return view('dashboard', compact('jobs')); // Using default dashboard.blade.php
    }

    // delete job
    public function deleteJob($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
    
        return redirect()->back()->with('success', 'Job deleted successfully!');
    }
    

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
