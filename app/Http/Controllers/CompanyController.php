<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    
    public function index()
    {
        return view('company.dashboard');
    }
}

