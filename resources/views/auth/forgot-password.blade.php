<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-4 text-sm text-dark dark:text-light">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-form.label for="email" value="{{ __('Email') }}"/>
                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
                              autofocus autocomplete="username"/>
                <x-form.input-error for="email"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.primary>
                    {{ __('Email Password Reset Link') }}
                </x-button.primary>
            </div>
        </form>
    </div>
</x-app-layout>
