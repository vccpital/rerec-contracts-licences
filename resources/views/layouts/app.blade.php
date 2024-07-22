<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rerec') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
            /* Footer Styling */
            .footer {
                position: relative;
                color: white;
                padding: 20px 0;
                overflow: hidden; /* To ensure the pseudo-element is contained */
                text-align: center;
            }

            /* Pseudo-element for the diagonal border */
            .footer::before {
                content: '';
                position: absolute;
                top: -30px; /* Position above the footer */
                left: 0;
                width: 100%;
                height: 60px; /* Increase height for better visibility */
                background: #09703B;/* Different color for visibility */
                transform: skewY(-10deg); /* Create the diagonal effect */
                z-index: 1;
            }

            /* Ensure footer content is visible */
            .footer .container {
                position: relative;
                z-index: 2; /* Above the pseudo-element */
                padding-top: 30px; /* Add padding to move content below the diagonal */
            }
            .footer p::after {
                content: " ★"; /* Decorative icon, customizable */
                font-weight: 600;
                color: var(--footer-accent-color);
            }
    </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main style="margin-left: 250px; width: calc(100% - 250px);">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
