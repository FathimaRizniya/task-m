<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <div class="mt-4 space-x-4">
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Manage Categories</a>
        <a href="{{ route('admin.tasks.index') }}" class="px-4 py-2 bg-green-500 text-white rounded">Manage Tasks</a>
        </div>
    </x-slot>

   
        <!-- Logout form -->
        {{-- <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
                Logout
            </button>
        </form> --}}
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome, Admin!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
