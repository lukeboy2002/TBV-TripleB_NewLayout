<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <x-heading>New User</x-heading>
        <form method="POST" action="{{ route('accept-invitation.store') }}">
            @csrf
            <input type="hidden" id="invited_by" name="invited_by" value="{{ $invitation->invited_by }}">

            <div>
                <x-form.label for="username" value="{{ __('Username') }}"/>
                <x-form.input id="username" class="block mt-1 w-full" type="text" name="username"
                              :value="old('username')"
                              required
                              autofocus
                              autocomplete="username"/>
                <x-form.input-error for="username"/>
            </div>

            <div class="mt-4">
                <x-form.label for="email" value="{{ __('Email') }}"/>
                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email', $email)"
                              required
                              autocomplete="email"/>
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
                <x-form.input-error for="password"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-form.label for="terms">
                        <div class="flex items-center">
                            <x-form.checkbox name="terms" id="terms" required/>

                            <div class="ms-2">

                                {!! __('I agree to the') !!}
                                <x-link.primary class="text-sm" href="{{ route('terms.show') }}">
                                    {{ __('terms of service') }}
                                </x-link.primary>
                                <x-link.primary class="text-sm" href="{{ route('policy.show') }}">
                                    {{ __('privacy policy') }}
                                </x-link.primary>

                            </div>
                        </div>
                    </x-form.label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button.primary class="ms-4">
                    {{ __('Register') }}
                </x-button.primary>
            </div>
        </form>
    </div>
</x-app-layout>
