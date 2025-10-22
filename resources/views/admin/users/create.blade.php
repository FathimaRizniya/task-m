<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New User</title>
<style>
    body {
        background-color: #0f172a;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        color: #e2e8f0;
    }
    .container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }
    .form-box {
        width: 100%;
        max-width: 450px;
        background: #1e293b;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        border-radius: 16px;
        padding: 2.5rem;
    }
    .form-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #38bdf8;
        text-align: center;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    label {
        display: block;
        font-weight: 500;
        color: #cbd5e1;
        margin-bottom: 0.5rem;
    }
    input, select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #334155;
        border-radius: 12px;
        background: #0f172a;
        color: #e2e8f0;
        font-size: 15px;
        transition: border 0.2s, box-shadow 0.2s;
    }
    input:focus, select:focus {
        outline: none;
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
    }
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-green {
        background: #22c55e;
        color: #0f172a;
    }
    .btn-green:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(34,197,94,0.4);
    }
    .btn-gray {
        background: #64748b;
        color: #f1f5f9;
    }
    .btn-gray:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(100,116,139,0.4);
    }
    .error-box {
        background: #f87171;
        border-left: 5px solid #b91c1c;
        color: #fff;
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1rem;
    }
    .error-list {
        list-style: disc inside;
        margin: 0;
        padding-left: 1rem;
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
