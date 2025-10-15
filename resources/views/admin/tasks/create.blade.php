{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Create Task</h2> --}}

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    </head>
    <body>
        
    </body>
    </html>
<div class="container mx-auto p-4">
    <h1>Create Task</h1>

    <form action="{{ route('admin.tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="task_name" class="block font-medium">Task Name</label>
            <input type="text" name="task_name" id="task_name" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="border rounded w-full p-2"></textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium">Category</label>
            <select name="category_id" id="category_id" class="border rounded w-full p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="assigned_user_id" class="block font-medium">Assign to User</label>
            <select name="assigned_user_id" id="assigned_user_id" class="border rounded w-full p-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="deadline" class="block font-medium">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status" class="border rounded w-full p-2">
                <option value="Pending">Pending</option>
                <option value="Progress">Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Task</button>
    </form>
</div>
{{-- @endsection --}}
