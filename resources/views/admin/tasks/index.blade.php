<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">

            <div class="flex space-x-4">
                <a href="{{ route('admin.tasks.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
                    Create New Task
                </a>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
                    Back to Dashboard
                </a>
            </div>
       
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Task Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Assigned User</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Deadline</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $task->id }}</td>
                        <td class="px-4 py-2">{{ $task->task_name }}</td>
                        <td class="px-4 py-2">{{ $task->category->category_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $task->assignedUser->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $task->status }}</td>
                        <td class="px-4 py-2">{{ $task->deadline ?? 'N/A' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center">No tasks found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
