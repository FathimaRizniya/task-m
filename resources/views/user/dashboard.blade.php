<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
             
                <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-4 text-white">
                    <h3 class="text-xl font-bold">Welcome, {{ Auth::user()->name }} </h3>
                    
                </div>

              
                <div class="p-8 text-gray-900 dark:text-gray-100 space-y-6">

                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('user.tasks') }}" 
                           class="flex items-center gap-2 px-5 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-xl shadow-md transition duration-200">
                             View My Tasks
                        </a>
                        <a href="{{ route('user.categories') }}" 
                           class="flex items-center gap-2 px-5 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl shadow-md transition duration-200">
                             View Categories
                        </a>
                    </div>

                    
                    <div class="mt-6 border-t border-gray-300 dark:border-gray-700 pt-6">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            You are logged in as a 
                            <span class="font-semibold text-indigo-600 dark:text-indigo-400">user</span>.  
                            From here, you can manage your tasks, view categories, and  updated on your progress.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
