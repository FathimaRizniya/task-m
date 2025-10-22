<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Management</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #0f172a;
        color: #e2e8f0;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #38bdf8;
        text-align: center;
        margin: 30px 0;
    }

    .table-card {
        max-width: 1200px;
        margin: 0 auto 40px auto;
        background: #1e293b;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0,0,0,0.4);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background: #111827;
        border-bottom: 1px solid #334155;
    }

    .card-header h3 {
        margin: 0;
        font-size: 1.5rem;
        color: #38bdf8;
        font-weight: 600;
    }

    .card-header .btn {
        padding: 10px 18px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        margin-left: 10px;
        transition: all 0.2s ease-in-out;
    }

    .btn-add {
        background: #22c55e;
        color: #0f172a;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34,197,94,0.4);
    }

    .btn-back {
        background: #2563eb;
        color: #ffffff;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59,130,246,0.4);
    }

    .alert-success {
        background: #1e3a8a;
        color: #d1fae5;
        padding: 15px 20px;
        border-radius: 12px;
        max-width: 1200px;
        margin: 20px auto;
        font-weight: 500;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    th, td {
        padding: 16px 20px;
        text-align: left;
        border-bottom: 1px solid #334155;
    }

    th {
        background: #0f172a;
        color: #38bdf8;
        font-weight: 600;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    tr:hover {
        background: #2563eb33;
    }

    .badge-admin {
        background: #2563eb;
        color: #ffffff;
        padding: 6px 14px;
        border-radius: 9999px;
        font-size: 0.85em;
        font-weight: 500;
    }

    .badge-user {
        background: #10b981;
        color: #ffffff;
        padding: 6px 14px;
        border-radius: 9999px;
        font-size: 0.85em;
        font-weight: 500;
    }

    .action-link {
        color: #38bdf8;
        text-decoration: none;
        margin-right: 12px;
        font-weight: 500;
    }

    .action-link:hover {
        text-decoration: underline;
    }

    .action-delete {
        color: #f87171;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: 500;
    }

    .action-delete:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        th, td {
            padding: 12px 10px;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-header .btn {
            margin-left: 0;
            margin-top: 10px;
        }
    }
</style>
</head>
<body>

<h2>User Management</h2>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="table-card">
    <div class="card-header">
        <h3>Users List</h3>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-add">Add User</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Back to Dashboard</a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="font-weight: 500;">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="{{ $user->usertype === 'admin' ? 'badge-admin' : 'badge-user' }}">
                        {{ ucfirst($user->usertype) }}
                    </span>
                </td>
                <td style="text-align:center;">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="action-link">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this user?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="action-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; color:#94a3b8;">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
