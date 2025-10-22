<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        /* === Base Styling === */
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #f8fafc, #e0e7ff);
            margin: 0;
            padding: 40px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .edit-card {
            background: #ffffff;
            width: 100%;
            max-width: 650px;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .edit-card:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            color: #1e293b;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 25px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
        }

        /* === Form Elements === */
        label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            color: #111827;
            background-color: #f9fafb;
            margin-bottom: 18px;
            transition: all 0.25s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
            outline: none;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .readonly {
            background-color: #f3f4f6;
            color: #6b7280;
        }

        /* === Buttons === */
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .btn-submit {
            background: linear-gradient(to right, #6366f1, #4f46e5);
            color: white;
            box-shadow: 0 3px 8px rgba(99, 102, 241, 0.25);
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #4f46e5, #4338ca);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35);
        }

        /* === Alerts === */
        .alert.success {
            background-color: #ecfdf5;
            border-left: 5px solid #10b981;
            color: #065f46;
            padding: 12px 18px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
        }

        /* === Responsive === */
        @media (max-width: 640px) {
            .edit-card {
                padding: 25px 20px;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="edit-card">
        <h2>Edit Task</h2>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" class="readonly" value="{{ $task->task_name }}" readonly>

            <label for="category">Category</label>
            <input type="text" id="category" class="readonly" value="{{ $task->category->category_name ?? 'N/A' }}" readonly>

            <label for="deadline">Deadline</label>
            <input type="date" id="deadline" class="readonly" value="{{ $task->deadline }}" readonly>

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
