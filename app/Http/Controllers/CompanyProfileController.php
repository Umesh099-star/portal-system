<?php
namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    // Create new company profile
    public function create()
    {
        return view('company.profile');
    }

    // Store the company profile
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:company_profile,email',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        CompanyProfile::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);

        return redirect()->route('company.setting')->with('success', 'Profile created successfully');
    }
}
