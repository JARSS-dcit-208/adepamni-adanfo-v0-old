<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <!-- Quote Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 mb-6">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Quote of the Day</h4>
                    <blockquote class="text-gray-900 dark:text-gray-100">
                        <p class="text-xl mb-4">"{{ $quote['content'] }}"</p>
                        <cite class="block mt-2 text-right text-gray-500">- {{ $quote['author'] }}</cite>
                    </blockquote>
                </div>
                
                <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-3">

                    <!-- Total Customers Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                        <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Total Customers</h4>
                        <p class="text-2xl text-gray-900 dark:text-gray-100">{{ $totalCustomers }}</p>
                    </div>

                    <!-- Total Designs Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                        <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Total Designs</h4>
                        <p class="text-2xl text-gray-900 dark:text-gray-100">{{ $totalDesigns }}</p>
                    </div>

                    <!-- Total Measurements Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                        <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Total Measurements</h4>
                        <p class="text-2xl text-gray-900 dark:text-gray-100">{{ $totalMeasurements }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
