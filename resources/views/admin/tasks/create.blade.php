<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
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
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
        }

        textarea {
            resize: none;
            height: 120px;
        }

        button {
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
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
            box-shadow: 0 6px 20px rgba(56, 189, 248, 0.4);
        }

        .alert-success {
            background: #d1fae5;
            border-left: 5px solid #10b981;
            padding: 12px 18px;
            color: #065f46;
            margin-bottom: 20px;
            border-radius: 12px;
            font-weight: 500;
        }

        p.error-msg {
            color: #f87171;
            font-size: 14px;
            margin-top: -12px;
            margin-bottom: 12px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-btn {
            background: #334155;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .back-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(56, 189, 248, 0.4);
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
                <p class="error-msg">{{ $message }}</p>
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
                <p class="error-msg">{{ $message }}</p>
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
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}" required>
            @error('deadline')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Progress" {{ old('status') == 'Progress' ? 'selected' : '' }}>Progress</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <div class="form-actions">
                <button type="submit">Create Task</button>
                <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>
