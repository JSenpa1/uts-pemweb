<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're admin!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="mx-auto max-w-7xl lg:px-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.location.href='{{ url('/post')}}'">Go to Admin Page</button>
        </div>
    </div>

    <div class="container mx-auto mt-6">
        <div class="mx-auto max-w-7xl lg:px-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.location.href='{{ url('/UserMenu')}}'">Go to Menu Page</button>
        </div>
    </div>

</x-app-layout>
