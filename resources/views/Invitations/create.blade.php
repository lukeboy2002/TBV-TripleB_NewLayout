<x-app-layout title="Invite User">
    <x-heading>Invite User</x-heading>
    <x-card.default>
        <form action="{{ route('invitation.store') }}" method="POST" class="space-y-6 p-6">
            @csrf
            <div>
                <x-form.label for="email" class="pb-2" value="{{ __('Email') }}"/>
                <x-form.input type="email" id="email" name="email" :value="old('email')" required autofocus/>
                <x-form.input-error for="email"/>
            </div>
            <div class="flex justify-end items-center">
                <x-button.primary>Invite user</x-button.primary>
            </div>
        </form>
    </x-card.default>

    <x-card.default class="mt-6">
        <livewire:invitation-index/>
    </x-card.default>
    <x-slot name="side">
        To be Continued
    </x-slot>
</x-app-layout>
