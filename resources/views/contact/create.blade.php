<x-app-layout title="Contact">
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/contact.jpg") }}"
             alt="Background Image"
             class="absolute inset-0 w-full h-124 object-cover object-bottom"
        />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide text-xl md:text-2xl uppercase">
                Contact
            </h3>
            <h1 class="text-5xl font-heading font-black tracking-wider uppercase text-white">
                TBV-TripleB
            </h1>
        </div>
    </x-slot>

    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
        @csrf
        <div>
            <x-form.label for="name" value="{{ __('Name') }}"/>
            <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name"/>
            <x-form.input-error for="name"/>
        </div>
        <div class="mt-4">
            <x-form.label for="email" value="{{ __('Email') }}"/>
            <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                          required/>
            <x-form.input-error for="email"/>
        </div>
        <div class="mt-4">
            <x-form.label for="subject" value="{{ __('Subject') }}"/>
            <x-form.input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')"
                          required/>
            <x-form.input-error for="subject"/>
        </div>
        <div class="mt-4">
            <x-form.label for="body" value="{{ __('Whats your question') }}"/>
            <textarea id="body" name="body" required> </textarea>
            <x-form.input-error for="body"/>
        </div>
        <div class="mt-4 flex justify-end">
            <x-button.primary>Submit</x-button.primary>
        </div>
    </form>
    <x-slot name="side">
        to be continued
    </x-slot>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#body'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Link'],
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</x-app-layout>
