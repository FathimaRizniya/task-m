<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #0f172a;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #1e293b;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        h2 {
            text-align: center;
            color: #38bdf8;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #cbd5e1;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #334155;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 15px;
            background: #0f172a;
            color: #e2e8f0;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56,189,248,0.3);
        }

        textarea {
            resize: none;
            height: 120px;
        }

        button {
            background: linear-gradient(90deg, #22c55e, #16a34a);
            color: black;
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(34,197,94,0.4);
        }

        a.back-btn {
            background: #2563eb;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            margin-left: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        a.back-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(59,130,246,0.4);
        }

        .form-actions {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Edit Task</h2>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_name">Task Name</label>
        <input type="text" name="task_name" id="task_name" value="{{ $task->task_name }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $task->description }}</textarea>

        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
               <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <label for="assigned_user">Assign to User</label>
        <select name="assigned_user" id="assigned_user">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $task->assigned_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="deadline">Deadline</label>
        <input type="date" name="deadline" id="deadline" 
               value="{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '' }}">

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Progress" {{ $task->status == 'Progress' ? 'selected' : '' }}>Progress</option>
            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <div class="form-actions">
            <button type="submit">Update Task</button>
            <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
        </div>
    </form>

</div>
</body>
</html>
