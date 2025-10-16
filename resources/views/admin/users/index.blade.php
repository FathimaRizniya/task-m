<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>

    <style>
        body {
            background: #f7fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

       
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 32px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th {
            background: #080d11;
            color: #ffffff;
            font-weight: 600;
        }
        tr:hover {
            background: #89b5e0;
        }
        .btn {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 8px;
            background: #09f300;
            color: #000000;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #b0f1c0;
        }
        .badge-admin {
            background: #dbeafe;
            color: #1e40af;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.9em;
        }
        .badge-user {
            background: #658feb;
            color: #121312;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.9em;
        }
        .action-link {
            color: #047a14;
            text-decoration: none;
            margin-right: 16px;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .action-delete {
            color: #dc2626;
            background: none;
            border: none;
            cursor: pointer;
        }
        .alert-success {
            background: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        .pagination {
            margin-top: 24px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="container">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h2 style="display: flex; justify-content: center; font-size: 2rem; font-weight: bold; color: #1e293b;">User Management</h2>
            
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn"> Add the User</a>
            
        <a href="{{ route('admin.dashboard') }}" class="btn">back to dashboard</a>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="font-weight: 500; color: #1e293b;">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="{{ $user->usertype === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                    {{ ucfirst($user->usertype) }}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="action-link">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this user?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="action-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #6b7280;">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

       
    </div>

</body>
</html>
