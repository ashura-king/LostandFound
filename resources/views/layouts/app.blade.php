<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Removed dark:bg-gray-900 -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <!-- Removed dark:bg-gray-800 -->
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        <!-- Removed dark:text-gray-200 -->
                        Lost and Found System
                    </h1>
                </div>

                <div class="space-x-4">
                    @if(Auth::check())
                    <span class="text-gray-700">
                        <!-- Removed dark:text-gray-300 -->
                        Welcome, {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:underline">
                            <!-- Removed dark:text-blue-400 -->
                            Logout
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                        <!-- Removed dark:text-blue-400 -->
                        Login
                    </a>
                    <span class="text-gray-500">|</span>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                        <!-- Removed dark:text-blue-400 -->
                        Register
                    </a>
                    @endif
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>