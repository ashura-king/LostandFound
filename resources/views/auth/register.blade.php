<x-guest-layout>
  <div class="h-[60vh] flex items-center justify-center bg-gray-100">
    <div class="bg-white p-4 rounded-lg shadow-md w-full max-w-sm">
      <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Create Account</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label for="password" :value="__('Password')" />
          <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
          <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
            name="password_confirmation" required autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between mt-6">
          <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-medium">
            Already have an account?
          </a>

          <x-primary-button class="ml-4 bg-blue-500 hover:bg-blue-600">
            {{ __('Register') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>