<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-cyan-400 tracking-wide animate__animated animate__fadeInDown">
            {{ __('Create a new Category') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-xl rounded-2xl p-8">
                <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="category_name" class="block text-gray-300 font-semibold mb-2">Category Name:</label>
                        <input type="text" name="category_name" id="category_name"
                               class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-200 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                               required>
                    </div>

                    <div>
                        <label for="description" class="block text-gray-300 font-semibold mb-2">Description:</label>
                        <textarea name="description" id="description"
                                  class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-200 focus:outline-none focus:ring-2 focus:ring-cyan-400"></textarea>
                    </div>

                    <div>
                        <label for="status" class="block text-gray-300 font-semibold mb-2">Status:</label>
                        <select name="status" id="status"
                                class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-200 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit"
                                class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 text-black font-semibold rounded-xl shadow-lg hover:scale-105 transform transition">
                            Create
                        </button>

                        <a href="{{ route('admin.dashboard') }}"
                           class="px-6 py-2 bg-gray-700 text-white font-semibold rounded-xl shadow-lg hover:scale-105 transform transition">
                            Back to Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
