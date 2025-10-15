<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/')->with('error', 'Access denied. Admins only.');
        }

        return view('admin.dashboard');
    }
}
