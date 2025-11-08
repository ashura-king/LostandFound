<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Lost & Found' }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
  .gradient-bg {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  .card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .nav-link {
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: currentColor;
    transition: width 0.3s ease;
  }

  .nav-link:hover::after {
    width: 100%;
  }

  .btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
  }
  </style>
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Header -->
    <header class="gradient-bg shadow-lg">
      <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <!-- Logo and Title -->
          <div class="flex items-center mb-4 md:mb-0">
            <div class="bg-white rounded-full p-2 mr-4 shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <div>
              <h1 class="text-3xl font-bold text-white">
                Lost and Found System
              </h1>
              <p class="text-purple-200 mt-1">Helping reunite people with their lost items</p>
            </div>
          </div>

          <!-- Auth Navigation -->
          <div class="flex items-center space-x-4 bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
            @if(Auth::check())
            <div class="flex items-center space-x-3">
              <div class="h-8 w-8 rounded-full bg-white/30 flex items-center justify-center">
                <span class="text-white font-medium text-sm">
                  {{ substr(Auth::user()->name, 0, 1) }}
                </span>
              </div>
              <span class="text-white font-medium">
                {{ Auth::user()->name }}
              </span>
              <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                  class="text-white hover:text-purple-200 transition-colors duration-200 font-medium">
                  Logout
                </button>
              </form>
            </div>
            @else
            <div class="flex space-x-4">
              <a href="{{ route('login') }}"
                class="text-white hover:text-purple-200 transition-colors duration-200 font-medium">
                Login
              </a>
              <span class="text-white">|</span>
              <a href="{{ route('register') }}"
                class="text-white hover:text-purple-200 transition-colors duration-200 font-medium">
                Register
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
      {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h3 class="text-xl font-bold mb-4">Lost & Found</h3>
            <p class="text-gray-400">
              A platform dedicated to helping people recover their lost items and return found items to their rightful
              owners.
            </p>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Report Lost Item</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Browse Found Items</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">How It Works</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
            </ul>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
            <ul class="space-y-2 text-gray-400">
              <li>Email: help@lostfound.com</li>
              <li>Phone: (123) 456-7890</li>
              <li>Address: 123 Recovery St, City, State</li>
            </ul>
          </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
          <p>&copy; {{ date('Y') }} Lost & Found System. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>