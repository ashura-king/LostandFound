<x-guest-layout>
  <div class="h-[60vh] flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-sm bg-white p-4 rounded-lg shadow-md">
      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-xl font-semibold text-gray-900">Lost & Found</h1>
        <p class="text-sm text-gray-500 mt-1">Sign in to continue</p>
      </div>

      <!-- Login Form -->
      <div class="bg-white p-5 rounded-lg shadow-md border border-gray-200">
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
          @csrf

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required
              class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
              value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password" required
              class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
          </div>

          <!-- Remember & Forgot -->
          <div class="flex items-center justify-between text-sm">
            <label class="flex items-center space-x-1">
              <input type="checkbox" id="remember_me" name="remember"
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
              <span class="text-gray-600">Remember me</span>
            </label>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
              Forgot?
            </a>
            @endif
          </div>

          <!-- Login Button -->
          <button type="submit"
            class="w-full bg-blue-600 text-white py-1.5 text-sm rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150">
            Sign in
          </button>
        </form>

        <!-- Register Link -->
        <div class="mt-4 text-center text-sm text-gray-600">
          Don't have an account?
          <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
            Sign up
          </a>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>