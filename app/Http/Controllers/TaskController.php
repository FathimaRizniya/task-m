<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   

    public function index()
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

        $tasks = Task::with('category', 'assignedUser')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

       

        $categories = Category::all();
        $users = User::where('usertype', 'user')->get();
        return view('admin.tasks.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

        $request->validate([
            'task_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'assigned_user_id' => 'required|exists:users,id',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        Task::create($request->only('task_name','category_id','assigned_user_id','description','deadline','status'));
        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

        $task = Task::findOrFail($id);
        $categories = Category::all();
        $users = User::where('usertype', 'user')->get();
        return view('admin.tasks.edit', compact('task', 'categories', 'users'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

        $request->validate([
            'task_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'assigned_user_id' => 'required|exists:users,id',
            'deadline' => 'required|date|after_or_equal:today',
            'status' => 'required|in:Pending,Progress,Completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->only('task_name','category_id','assigned_user_id','description','deadline','status'));
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully!'); //admin remove
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'admin') {
            return redirect('/user/dashboard')->with('error', 'Access denied.');
        }

        Task::findOrFail($id)->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully!'); //admin remove
    }

    

    public function userTasks()
    {
        if (!Auth::check() || Auth::user()->usertype !== 'user') {
            return redirect('/admin/dashboard')->with('error', 'Access denied.');
        }

        $tasks = Task::where('assigned_user_id', Auth::id())->get();
        return view('user.tasks.index', compact('tasks'));
    }

    public function editOwn($id)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'user') {
            return redirect('/admin/dashboard')->with('error', 'Access denied.');
        }

        $task = Task::where('assigned_user_id', Auth::id())->findOrFail($id);
        return view('user.tasks.edit', compact('task'));
    }

    public function updateOwn(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->usertype !== 'user') {
            return redirect('/admin/dashboard')->with('error', 'Access denied.');
        }

        $request->validate([
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Progress,Completed',
        ]);

        $task = Task::where('assigned_user_id', Auth::id())->findOrFail($id);
        $task->update($request->only(['description','status']));

        return redirect()->route('user.tasks')->with('success', 'Task updated successfully!');
    }
}
