<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-cyan-400 tracking-wide animate__animated animate__fadeInDown">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 md:px-12 w-full bg-gray-900 min-h-screen">
       
        <div class="mb-6 flex flex-wrap gap-4">
            <a href="{{ route('admin.tasks.create') }}"
               class="px-6 py-3 bg-gradient-to-r from-blue-500 via-cyan-500 to-teal-500 text-black font-semibold rounded-xl shadow-lg hover:scale-105 transform transition">
                Create New Task
            </a>
            <a href="{{ route('admin.dashboard') }}"
               class="px-6 py-3 bg-gray-700 text-white font-semibold rounded-xl shadow-lg hover:scale-105 transform transition">
                Back to Dashboard
            </a>
        </div>

      
        <div class="overflow-x-auto bg-gray-800 rounded-2xl shadow-xl w-full">
            <table class="w-full table-auto divide-y divide-gray-700">
                <thead class="bg-gray-700 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">ID</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Task Name</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Category</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Assigned User</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Status</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Deadline</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900">
                    @forelse($tasks as $task)
                        <tr class="hover:bg-gray-700 {{ $loop->even ? 'bg-gray-800' : 'bg-gray-900' }} transition">
                            <td class="px-6 py-4 text-gray-200">{{ $task->id }}</td>
                            <td class="px-6 py-4 text-gray-200 font-medium">{{ $task->task_name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $task->category->category_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $task->assignedUser->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    {{ $task->status === 'Completed' ? 'bg-green-500 text-black' : 'bg-yellow-500 text-black' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $task->deadline ?? 'N/A' }}</td>
                            <td class="px-6 py-4 space-x-2 flex flex-wrap">
                                <a href="{{ route('admin.tasks.edit', $task->id) }}"
                                   class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg font-semibold transition transform hover:scale-105">
                                    Edit
                                </a>
                                <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-black rounded-lg font-semibold transition transform hover:scale-105">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-400 font-medium">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
