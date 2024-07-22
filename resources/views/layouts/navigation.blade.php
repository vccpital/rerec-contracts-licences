<nav x-data="{ open: false }" class="bg-nav sidebar dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 text-light">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" style="width: 216px; height: 84px;">
                        <!-- Assuming 'x-application-logo' is a custom component or image -->
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10">
                    <!-- Assuming 'x-nav-link' is a custom Laravel Blade component -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="General Dashboard">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger (Mobile Menu Toggle) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <!-- Hamburger Icon -->
                    <svg class="h-9 w-9" stroke="#ee662a" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-dark">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Responsive Navigation Links -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Profile Link -->
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Actions (User-specific actions) -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-3 mb-6 w-100 items-center justify-center fw-bold text-decoration-none py-2 px-4 text-center">
            <!-- Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center dashboard-button mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Dashboard">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18h14V3H5zm2 0h10v18H7V3z" />
                </svg>
            </a>

            <!-- Links to other sections -->
            <a href="{{ route('contracts.index') }}" class="text-decoration-none mb-2 text-light">
                Contracts
            </a>

            <a href="{{ route('licences.index') }}" class="text-decoration-none text-light">
                Licences
            </a><br>

            <a href="#" class="text-decoration-none text-light">
                Reports
            </a>
        </div>
    </div>

    <!-- Inline Styles and Additional CSS -->
    <style>
        .bg-nav {
            background-color: #09703B;
        }
        .nav-link {
            color: #fff;
        }
        .nav-link:hover {
            background-color: #dd5518;
        }
        .nav-item {
            margin: 10px 0;
        }
        .sidebar {
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #ee662a;
            padding-top: 20px;
        }
        .top-nav {
            margin-left: 250px; /* Offset by the sidebar width */
            width: calc(100% - 250px); /* Full width minus the sidebar width */
            top: 0;
            position: fixed;
            border-color: transparent;
        }
        .dashboard-button {
            background-color: #ee662a;
            color: #fff;
            padding: 2px 2px 2px 2px; /* Compact padding */
            border-radius: 30px; /* Rounded corners */
            font-size: 0.9rem; /* Slightly smaller font size */
            font-weight: bold; /* Bold text */
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-flex; /* Use flexbox for centering */
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            width: 120px; /* Fixed width */
            height: 40px; /* Fixed height */
            text-align: center; /* Center text */
            margin-top: 45px;
            line-height: var(--bs-btn-line-height);
            vertical-align: middle;
            --bs-btn-line-height: 1.5;
        }

        .dashboard-button:hover {
            background-color: #0b351d;
            font-weight: normal; /* Slightly change weight on hover */
        }
    </style>
</nav>

<!-- Top Navigation Bar -->
<nav x-data="{ open: false }" class="top-nav bg-light dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 position-fixed w-full z-10">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Additional Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Add more top nav links as needed -->
                </div>
            </div>

            <!-- User Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <!-- User Dropdown Button -->
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <!-- Dropdown Icon -->
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Profile Link -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

<!-- jQuery for Search Functionality (Ensure it's included only once) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS (Include the bundled JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Initialize Bootstrap tooltips -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
