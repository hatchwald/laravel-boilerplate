<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            
            <!-- Page Content -->
            <main>
                <div class="flex">
                    {{-- Navbar --}}
                    <div class="block w-1/5 sm:hidden md:block lg:block h-screen shadow-md bg-white " id="">
                        <x-sidebar>
                            
                        </x-sidebar>
                    </div>
                    
                    
                    <!-- main content page -->
                    <div class="w-4/5">
                        @include('layouts.navigation')
                        {{ $slot }}
                    </div>
                </div>   
            </main>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</html>
