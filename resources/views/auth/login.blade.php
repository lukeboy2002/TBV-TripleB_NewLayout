<x-app-layout title="Login">
    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-form.label for="username" value="{{ __('Username') }}"/>
                <x-form.input id="username" class="block mt-1 w-full" type="text" name="username"
                              :value="old('username')"
                              required
                              autofocus autocomplete="username"/>
                <x-form.input-error for="username"/>
            </div>

            <div class="mt-4">
                <x-form.label for="password" value="{{ __('Password') }}"/>
                <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required
                              autocomplete="current-password"/>
                <x-form.input-error for="password"/>
            </div>

            <div class="block mt-4">
                <x-form.label for="remember_me" class="flex items-center">
                    <x-form.checkbox id="remember_me" name="remember"/>
                    <span class="ms-2 text-sm text-dark dark:text-light">{{ __('Remember me') }}</span>
                </x-form.label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <x-link.primary class="text-sm"
                                    href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-link.primary>
                @endif

                <x-button.primary class="ms-4">
                    {{ __('Log in') }}
                </x-button.primary>
            </div>
        </form>
    </div>
</x-app-layout>
