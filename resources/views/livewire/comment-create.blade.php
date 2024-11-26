<div class="mb-6">
    <div>
        @auth()
            <div x-data="{
            focused: {{ $commentModel ? 'true' : 'false'}},
            isEdit: {{ $commentModel ? 'true' : 'false'}},
            init() {
                if (this.isEdit || this.focused)
                    this.$refs.input.focus();

                $wire.on('commentCreated', () => {
                    this.focused = false;
                })
            }
        }">
            <textarea x-ref="input"
                      wire:model="comment"
                      @click="focused = true"
                      class="block p-2.5 w-full text-sm bg-light text-dark dark:bg-dark dark:text-light rounded-lg border border-primary focus:ring-primary focus:border-primary placeholder-dark dark:placeholder-light"
                      :rows="isEdit || focused ? '4' : '1' "
                      placeholder="Leave a comment"
                      required
            ></textarea>
                <x-form.input-error for="comment" class="mt-2"/>

                <div :class="isEdit || focused ? 'flex justify-end items-center space-x-2 pt-4' : 'hidden'">
                    <x-button.secondary @click="focused = false; isEdit = false; $wire.dispatch('cancelEditing')"
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium">
                        Cancel
                    </x-button.secondary>
                    <x-button.primary wire:click="createComment" type="submit"
                                      class="px-3 py-2 text-xs font-medium">
                        Submit
                    </x-button.primary>
                </div>

            </div>
        @else
            <div class="flex justify-end items-center space-x-1">
                <p class="text-gray-900 dark:text-white text-xs">Only registered users can leave a comment.</p>
                <x-link.primary href="{{ route('login') }}" class="text-xs"> Login</x-link.primary>
            </div>
        @endauth
    </div>
</div>