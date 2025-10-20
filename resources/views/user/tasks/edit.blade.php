<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
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

        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
        }

        form input[type="text"],
        form input[type="date"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 15px;
            transition: 0.2s ease;
        }

        form input:focus,
        form select:focus,
        form textarea:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 18px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            border: none;
            transition: 0.2s ease;
        }

        .btn-cancel {
            background: #6b7280;
            color: white;
        }

        .btn-cancel:hover {
            background: #4b5563;
        }

        .btn-submit {
            background: #2563eb;
            color: white;
        }

        .btn-submit:hover {
            background: #1d4ed8;
        }

        .alert.success {
            background: #d1fae5;
            border-left: 5px solid #10b981;
            padding: 12px 18px;
            color: #065f46;
            margin: 15px auto;
            width: 90%;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ $task->task_name }}" readonly>

            <label for="category">Category</label>  
            
            <input type="text" id="category" value="{{ $task->category->category_name ?? 'N/A' }}" readonly>

            <label for="deadline">Deadline</label>
            <input type="date" id="deadline" value="{{ $task->deadline }}" readonly>

            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Progress" {{ $task->status == 'Progress' ? 'selected' : '' }}>Progress</option>
                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <p style="color:red;">{{ $message }}</p>
            @enderror

         
            <div class="button-group">
                <a href="{{ route('user.tasks') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>
