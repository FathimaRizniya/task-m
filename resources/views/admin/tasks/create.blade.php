<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            background: #fff;
            margin: 50px auto;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #1f2937;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
        }
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 15px;
        }
        textarea {
            resize: none;
            height: 100px;
        }
        button {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }
        button:hover {
            background: #1d4ed8;
        }
        .alert-success {
            background: #d1fae5;
            border-left: 5px solid #10b981;
            padding: 12px 18px;
            color: #065f46;
            margin-bottom: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create New Task</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.tasks.store') }}" method="POST">
            @csrf

            
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" value="{{ old('task_name') }}" required>
            @error('task_name')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

           
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

           
            <label for="assigned_user">Assign To</label>
            <select name="assigned_user" id="assigned_user" required>
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('assigned_user') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('assigned_user')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

            
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}" required>
            @error('deadline')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

            
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

           
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Progress" {{ old('status') == 'Progress' ? 'selected' : '' }}>Progress</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

           
            <div style="text-align:right;">
                <button type="submit">Create Task</button>
            </div>
        </form>
    </div>
</body>
</html>
