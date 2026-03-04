<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-50 text-gray-800">
    <header class="bg-white border-b border-gray-200 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('welcome') ?? '/' }}" class="text-2xl font-bold text-gray-900 hover:text-blue-600 transition-colors">
                    📝 Notes
                </a>
                <nav>
                    <ul class="flex items-center space-x-6">
                        <li><a href="{{ route('welcome') ?? '/' }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md transition-colors {{ request()->routeIs('welcome') ? 'text-blue-600 bg-blue-50' : '' }}">Home</a></li>
                        @auth
                            <li><a href="/notes" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md transition-colors {{ request()->is('notes*') ? 'text-blue-600 bg-blue-50' : '' }}">My Notes</a></li>
                            <li><a href="/notes/create" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md transition-colors {{ request()->routeIs('notes.create') ? 'text-blue-600 bg-blue-50' : '' }}">New Note</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li><a href="/login" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md transition-colors">Login</a></li>
                            <li><a href="/register" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">Sign Up</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="min-h-[70vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($title ?? null)
                <h1 class="text-3xl font-bold text-gray-900 mb-8">
                    {{ $title }}
                </h1>
            @endif
            @session('message')
                <div class='text-green-400'>{{ session('message') }}</div>
            @endsession()
            {{ $slot }}
        </div>
    </main>

    <footer class="mt-16 border-t border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Notes App. Simple note-taking made easy.
            </p>
        </div>
    </footer>
</body>
</html>