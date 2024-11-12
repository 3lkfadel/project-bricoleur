<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parametre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

    <div class="mt-4 flex justify-center space-x-4">
        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            <a href="{{ url('/') }}">MENU</a>
        </button>
        <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
            <a href="{{ url('/posts') }}">WELCOME</a>
        </button>
    </div>
            </div>
        </div>
    </div>

</x-app-layout>
