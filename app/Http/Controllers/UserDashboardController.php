<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Category;

class UserDashboardController extends Controller
{
   public function index()
{
    $user = Auth::user();

    $taskCount = Task::where('assigned_user', $user->id)->count();
    $pendingTasks = Task::where('assigned_user', $user->id)
                        ->where('status', 'Pending')
                        ->count();
    $categoryCount = Category::count(); // Or filter by user if needed

    return view('user.dashboard', compact('taskCount', 'pendingTasks', 'categoryCount'));
}
}
