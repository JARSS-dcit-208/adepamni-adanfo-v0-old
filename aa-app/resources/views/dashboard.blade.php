<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <!-- Search Bar -->
            <div class="relative">
                <input type="text" class="px-4 py-2 rounded-full" id="search-input" placeholder="Search customers or designs..." autocomplete="off">
                <div id="search-results" class="absolute mt-2 w-full bg-white dark:bg-gray-800 rounded-md shadow-lg z-50 hidden">
                    <!-- Search results will be appended here -->
                </div>
            </div>
        </div>
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

    <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById('search-input').addEventListener('input', async function() {
            let query = this.value.trim();

            if (query.length) {
                let response = await fetch(`/dashboard/search?query=${query}`);
                let data = await response.json();

                let resultsDiv = document.getElementById('search-results');
                resultsDiv.innerHTML = '';  // Clear previous results

                if (data.customers.length || data.designs.length) {
                    // Append customers
                    data.customers.forEach(customer => {
                        resultsDiv.innerHTML += `<a href="/customers/${customer.id}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">${customer.name}</a>`;
                    });

                    // Append designs
                    data.designs.forEach(design => {
                        resultsDiv.innerHTML += `<a href="/designs/${design.id}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">${design.description}</a>`;
                    });

                    resultsDiv.classList.remove('hidden');
                } else {
                    resultsDiv.classList.add('hidden');
                }
            } else {
                document.getElementById('search-results').classList.add('hidden');
            }
        });

        document.addEventListener('click', function(event) {
            let searchInput = document.getElementById('search-input');
            let searchResults = document.getElementById('search-results');

            // Check if the click is outside both the search input and the results div
            if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                searchResults.classList.add('hidden');
            }
        });
    </script>
    @endsection
</x-app-layout>
