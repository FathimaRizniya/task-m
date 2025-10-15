<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class UserController extends Controller
{
    public function index()
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        // Get tasks assigned to the logged-in user
        $tasks = Task::where('assigned_user_id', Auth::id())->get();

        return view('user.dashboard', compact('tasks'));
    }
}
