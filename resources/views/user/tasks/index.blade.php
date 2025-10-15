<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2">Task Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Deadline</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $task->task_name }}</td>
                        <td class="px-4 py-2">{{ $task->category->category_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $task->deadline ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $task->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('user.tasks.edit', $task->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center">No tasks assigned to you.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
