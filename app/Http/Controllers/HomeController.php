<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->latest()->get();
        return view('welcome', compact('jobs'));
    }
}

