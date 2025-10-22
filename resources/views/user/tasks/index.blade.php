<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">


            <div class="flex justify-between items-center bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Task List</h3>
                <a href="{{ route('user.dashboard') }}" 
                   class="px-4 py-2 bg-gray-100 text-gray-800 font-medium rounded-lg hover:bg-gray-200 transition-all duration-200">
                    Back to dashboard
                </a>
            </div>

           
            <table class="min-w-full table-auto text-sm text-left text-gray-700 dark:text-gray-200">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 uppercase text-xs font-semibold tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Task Name</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Deadline</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($tasks as $task)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <td class="px-6 py-4 font-medium">{{ $task->task_name }}</td>
                            <td class="px-6 py-4">{{ $task->category->category_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $task->deadline ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($task->status === 'completed')
                                        bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                    @elseif($task->status === 'pending')
                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100
                                    @else
                                        bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                    @endif">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('user.tasks.edit', $task->id) }}" 
                                   class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow transition-all duration-200">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No tasks assigned to you.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
