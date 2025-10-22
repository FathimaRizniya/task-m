<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #0f172a;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #1e293b;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #38bdf8;
            font-size: 2rem;
            font-weight: 700;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #cbd5e1;
        }

        input[type="text"],
        textarea,
        select {
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
        textarea:focus,
        select:focus {
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
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.4);
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

        a.back-btn {
            background: #334155;
            color: #f1f5f9;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: transform 0.2s, background 0.2s;
        }

        a.back-btn:hover {
            background: #475569;
            transform: scale(1.05);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        p.error-msg {
            color: #f87171;
            font-size: 14px;
            margin-top: -12px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Category</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" value="{{ old('category_name', $category->category_name) }}" required>
            @error('category_name')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Active" {{ old('status', $category->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $category->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <div class="form-actions">
                <button type="submit">Update Category</button>
                <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>
