<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status
        class="mb-6 text-center"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label
                for="email"
                :value="__('Email address')"
                class="text-gray-700 dark:text-gray-300 font-medium" />

            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-lg border-gray-300
                       focus:border-indigo-500 focus:ring-indigo-500
                       dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label
                for="password"
                :value="__('Password')"
                class="text-gray-700 dark:text-gray-300 font-medium" />

            <x-text-input
                id="password"
                class="mt-2 block w-full rounded-lg border-gray-300
                       focus:border-indigo-500 focus:ring-indigo-500
                       dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100"
                type="password"
                name="password"
                required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600
                           focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-700"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Remember me') }}
                </span>
            </label>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 hover:text-indigo-800
                           dark:text-indigo-400 dark:hover:text-indigo-300">
                    {{ __('Forgot password?') }}
                </a>
            @endif
            
        </div>
        <div>            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 
        dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __("Créer un compte") }}

            </a>
</div>

        <!-- Button -->
        <div>
            <x-primary-button
                class="w-full justify-center py-3 text-base
                       bg-indigo-600 hover:bg-indigo-700
                       focus:ring-indigo-500 rounded-xl">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
