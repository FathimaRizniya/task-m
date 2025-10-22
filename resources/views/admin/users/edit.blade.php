<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 font-sans">

<div class="min-h-screen flex justify-center items-center px-4">
    <div class="w-full max-w-md bg-gray-800 shadow-2xl rounded-xl p-8">
        <h2 class="text-3xl font-bold mb-6 text-center text-cyan-400">Edit User</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block font-medium text-gray-200 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                       required>
            </div>

            <div>
                <label class="block font-medium text-gray-200 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                       required>
            </div>

            <div>
                <label class="block font-medium text-gray-200 mb-1">User Type</label>
                <select name="usertype"
                        class="w-full p-3 rounded-lg border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                        required>
                    <option value="user" {{ old('usertype', $user->usertype) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('usertype', $user->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="flex justify-between items-center mt-6">
                <button type="submit"
                        class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 px-6 py-2 rounded-lg font-semibold transition transform hover:scale-105">
                    Update
                </button>
                <a href="{{ route('admin.users.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-gray-100 px-6 py-2 rounded-lg font-semibold transition transform hover:scale-105">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
