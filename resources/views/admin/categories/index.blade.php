<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-extrabold text-cyan-400 tracking-tight animate__animated animate__fadeInDown">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-900 py-10 px-6 md:px-12">
        
        <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
            <a href="{{ route('categories.create') }}"
               class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 transform transition">
                Create New Category
            </a>

            <a href="{{ route('admin.dashboard') }}"
               class="px-6 py-3 bg-gray-700 text-white font-bold rounded-xl shadow-lg hover:scale-105 transform transition">
                Back to Dashboard
            </a>
        </div>

        
        <div class="overflow-x-auto bg-gray-800 rounded-2xl shadow-xl">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">ID</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Name</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Description</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Status</th>
                        <th class="px-6 py-3 text-left text-cyan-400 font-bold uppercase tracking-wide">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900 divide-y divide-gray-700">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-200">{{ $category->id }}</td>
                            <td class="px-6 py-4 text-gray-200 font-medium">{{ $category->category_name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $category->description }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full font-semibold
                                    {{ $category->status === 'active' ? 'bg-green-500 text-black' : 'bg-yellow-500 text-black' }}">
                                    {{ ucfirst($category->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-2 flex flex-wrap">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="px-3 py-1 bg-green-500 hover:bg-green-600 text-black rounded-lg font-semibold transition transform hover:scale-105">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
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
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400 font-medium">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
