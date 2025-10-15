<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserController extends Controller
{
    public function index()
    {
       
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

       
        $tasks = Task::where('assigned_user', Auth::id())->get();

        return view('user.dashboard', compact('tasks'));
    }
}
