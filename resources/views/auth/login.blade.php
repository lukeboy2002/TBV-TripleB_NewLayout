<x-guest-layout>


    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="username" value="{{ __('Username') }}"/>
            <input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required
                   autofocus autocomplete="username"/>
        </div>

        <div class="mt-4">
            <label for="password" value="{{ __('Password') }}"/>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                   autocomplete="current-password"/>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <checkbox id="remember_me" name="remember"/>
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="ms-4">
                {{ __('Log in') }}
            </button>
        </div>
    </form>

</x-guest-layout>
