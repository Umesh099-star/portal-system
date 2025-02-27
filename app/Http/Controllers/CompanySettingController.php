<?php



namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job; //  Job model imported
use App\Models\User; //  user model imported
use App\Models\Application; //  application model imported
class CompanySettingController extends Controller
{
    // Show settings page and update profile if it exists
    public function index()
    {
        $companyProfile = CompanyProfile::where('user_id', Auth::id())->first();

        return view('company.setting', compact('companyProfile'));
    }

    // Update company profile
    public function update(Request $request)
    {
        $companyProfile = CompanyProfile::where('user_id', Auth::id())->first();

        // If no profile exists, redirect to create
        if (!$companyProfile) {
            return redirect()->route('company.profile.create');
        }

        $companyProfile->update($request->all());

        $companyProfile->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);

        return redirect()->route('company.setting')->with('success', 'Profile updated successfully');
    }

    // Delete company profile and related data
    public function delete()
    {
         // Get the authenticated company profile based on user_id
    $companyProfile = CompanyProfile::where('user_id', Auth::id())->first();

    if ($companyProfile) {
        // 1. Delete applications related to this company's jobs
        // Find the jobs for this company
        $jobs = $companyProfile->jobs;
        
        // Delete all applications related to the company's jobs
        foreach ($jobs as $job) {
            Application::where('job_id', $job->id)->delete();
        }

        // 2. Delete the jobs related to this company
        $companyProfile->jobs()->delete();

        // 3. Delete the company profile
        $companyProfile->delete();

        // 4. Delete the company (user) from the users table
        $user = User::where('id', Auth::id())->where('usertype', 'company')->first();
        
        if ($user) {
            $user->delete();
        }

        // Optionally, log out the user or redirect as needed
        Auth::logout();

        // Redirect to a page with success message
        return redirect()->route('login')->with('success', 'Your company account and related data have been deleted.');
    } else {
        // Company profile not found
        return redirect()->route('company.setting')->with('error', 'Company profile not found.');
    }
}
}