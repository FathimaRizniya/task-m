<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="category_name">Category Name:</label>
                        <input type="text" name="category_name" id="category_name" class="border rounded px-2 py-1 w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="border rounded px-2 py-1 w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="border rounded px-2 py-1 w-full">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
                    Back to Dashboard
                </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
