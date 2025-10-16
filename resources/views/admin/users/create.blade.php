<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            width: 100%;
            max-width: 400px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 2rem;
        }
        .form-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #2d3748;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        label {
            display: block;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }
        input, select {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: border 0.2s;
        }
        input:focus, select:focus {
            border-color: #4299e1;
        }
        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            font-weight: 500;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .btn-green {
            background: #16a34a;
        }
        .btn-green:hover {
            background: #15803d;
        }
        .btn-gray {
            background: #6b7280;
        }
        .btn-gray:hover {
            background: #4b5563;
        }
        .error-box {
            background: #fee2e2;
            border: 1px solid #f87171;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .error-list {
            list-style: disc inside;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-box">
        <h2 class="form-title">Add New User</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>User Type</label>
                <select name="usertype" required>
                    <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-green">Create</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-gray">Cancel</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
