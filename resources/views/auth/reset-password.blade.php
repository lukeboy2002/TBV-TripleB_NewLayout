<x-app-layout>
    {{--    <x-authentication-card>--}}
    {{--        <x-slot name="logo">--}}
    {{--            <x-authentication-card-logo />--}}
    {{--        </x-slot>--}}

    {{--        <x-validation-errors class="mb-4" />--}}
    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-form.label for="email" value="{{ __('Email') }}"/>
                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email', $request->email)" required autofocus autocomplete="username"/>
                <x-form.input-error for="email"/>
            </div>

            <div class="mt-4">
                <x-form.label for="password" value="{{ __('Password') }}"/>
                <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required
                              autocomplete="new-password"/>
                <x-form.input-error for="password"/>
            </div>

            <div class="mt-4">
                <x-form.label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-form.input id="password_confirmation" class="block mt-1 w-full" type="password"
                              name="password_confirmation" required autocomplete="new-password"/>
                <x-form.input-error for="password_confirmation"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.primary>
                    {{ __('Reset Password') }}
                </x-button.primary>
            </div>
        </form>
    </div>
</x-app-layout>
