<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4 bg-white mt-10 rounded shadow-md">

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
                   <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="assigned_user" class="block font-medium">Assign to User</label>
            <select name="assigned_user" id="assigned_user" class="border rounded w-full p-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->assigned_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="deadline" class="block font-medium">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="border rounded w-full p-2" 
                   value="{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '' }}">
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
</body>
</html>
