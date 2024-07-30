<div class="mb-6">
    <div>

        @auth()
            <div x-data="{
            focused: {{ $parentComment ? 'true' : 'false' }},
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
                      class="block p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                      :rows="isEdit || focused ? '4' : '1' "
                      placeholder="Leave a comment"
                      required
            ></textarea>
                <x-input-error for="comment" class="mt-2"/>

                <div :class="isEdit || focused ? 'flex justify-end items-center space-x-2 pt-4' : 'hidden'">
                    <div class="flex justify-end space-x-2" :class="isEdit || focused ? '' : 'hidden'">
                        <x-button @click="focused = false; isEdit = false; $wire.dispatch('cancelEditing')"
                                  type="button"
                                  class="px-3 py-2 text-xs font-medium">
                            Cancel
                        </x-button>
                        <x-button wire:click="createComment" type="submit" class="px-3 py-2 text-xs font-medium">
                            Submit
                        </x-button>
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-end items-center space-x-1">
                <p class="text-gray-900 dark:text-white text-xs">Only registered users can leave a comment.</p>
                <x-link href="{{ route('login') }}" class="text-xs"> Login</x-link>
            </div>
        @endauth
    </div>
</div>