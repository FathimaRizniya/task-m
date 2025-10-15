@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Edit Task</h2>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="task_name" class="block font-medium">Task Name</label>
            <input type="text" name="task_name" id="task_name" class="border rounded w-full p-2" value="{{ $task->task_name }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="border rounded w-full p-2">{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium">Category</label>
            <select name="category_id" id="category_id" class="border rounded w-full p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->Category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="assigned_user_id" class="block font-medium">Assign to User</label>
            <select name="assigned_user_id" id="assigned_user_id" class="border rounded w-full p-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->assigned_user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="deadline" class="block font-medium">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="border rounded w-full p-2" value="{{ $task->deadline->format('Y-m-d') }}">
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status" class="border rounded w-full p-2">
                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Progress" {{ $task->status == 'Progress' ? 'selected' : '' }}>Progress</option>
                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Task</button>
    </form>
</div>
@endsection
