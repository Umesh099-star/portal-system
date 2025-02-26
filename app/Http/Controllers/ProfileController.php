<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userprofile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the profile creation form
    public function create()
    {
        $profile = userprofile::where('user_id', Auth::id())->first();
        return view('job-seeker.profile', compact('profile'));
    }

    // Store a new job seeker profile
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_profile,email,' . Auth::id() . ',user_id',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'education' => 'nullable|string',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        userprofile::updateOrCreate(
            ['user_id' => Auth::id()], 
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'education' => $request->education,
                'cv' => $cvPath ?? userprofile::where('user_id', Auth::id())->value('cv'),
            ]
        );

        return redirect()->route('job-seeker.profile')->with('success', 'Profile updated successfully.');
    }

    // Show profile details
    public function show()
    {
        $profile = userprofile::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('job-seeker.profile')->with('error', 'Profile not found.');
        }

        return view('job-seeker.view', compact('profile'));
    }

    // Show edit form
    public function edit()
    {
        $profile = userprofile::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('job-seeker.profile')->with('error', 'Profile not found.');
        }

        return view('job-seeker.edit', compact('profile'));
    }

    // Update profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_profile,email,' . Auth::id() . ',user_id',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'education' => 'nullable|string',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $profile = userprofile::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('job-seeker.profile')->with('error', 'Profile not found.');
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $profile->cv = $cvPath;
        }

        $profile->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'education' => $request->education,
        ]);

        return redirect()->route('job-seeker.profile.view')->with('success', 'Profile updated successfully.');
    }

    // Delete profile
    public function destroy()
    {
        $profile = userprofile::where('user_id', Auth::id())->first();

        if (!$profile) {
            return redirect()->route('job-seeker.profile')->with('error', 'Profile not found.');
        }

        $profile->delete();

        return redirect()->route('job-seeker.profile')->with('success', 'Profile deleted successfully.');
    }
}
