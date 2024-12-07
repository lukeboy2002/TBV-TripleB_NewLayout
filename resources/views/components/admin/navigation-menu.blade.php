<nav class="bg-menu/90 border-b border-orange-500/30 px-4 py-2.5 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button
                data-drawer-target="drawer-navigation"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-light rounded-lg cursor-pointer md:hidden hover:text-primary focus:text-primary focus:ring-2 focus:ring-primary focus:outline-none"
            >
                <svg aria-hidden="true"
                     class="w-6 h-6"
                     fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"
                >
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"
                    ></path>
                </svg>
                <svg aria-hidden="true"
                     class="hidden w-6 h-6"
                     fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"
                >
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <x-logo/>
            <div class="text-xl font-heading font-black text-primary tracking-widest">TBV-TripleB</div>
        </div>
        <div class="flex items-center lg:order-2">
            <!-- Notifications -->
            <x-dropdown align="right" width="64">
                <x-slot name="trigger">
                    <button type="button"
                            class="p-2 mr-2 text-light rounded-lg cursor-pointer hover:text-primary focus:text-primary focus:ring-2 focus:ring-primary focus:outline-none">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <svg aria-hidden="true"
                             class="w-6 h-6"
                             fill="currentColor"
                             viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                            ></path>
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="block py-2 px-4 text-base font-medium text-center text-light bg-menu/90">
                        Notifications
                    </div>
                    <x-link.dropdown href="#">
                        lfasjflksdhfklhlkh
                    </x-link.dropdown>
                </x-slot>
            </x-dropdown>
            <!-- Notifications -->

            <!-- Apps -->
            {{--            <x-admin.apps/>--}}
            <!-- Apps -->

            <!-- User -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex rounded-full border-2 border-transparent text-sm transition focus:border-light focus:outline-none">
                            <img class="h-8 w-8 rounded-full object-cover"
                                 src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->username }}"
                            />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-light px-3 py-2 text-sm font-medium leading-4 text-dark transition duration-150 ease-in-out hover:text-dark focus:bg-dark focus:outline-none active:bg-gray-50">
                                {{ Auth::user()->username }}

                                <svg class="-me-0.5 ms-2 h-4 w-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor"
                                >
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                    />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 pb-3 text-xs text-light">
                        <p class="py-1"> {{ ucfirst(Auth::user()->username) }}</p>
                        <p class="py-1">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="border border-l border-primary/30"></div>
                    <x-link.dropdown wire:navigate href="{{ route('profile.show') }}">
                        {{ __("Profile") }}
                    </x-link.dropdown>
                    <x-link.dropdown wire:navigate href="{{ route('profile.show') }}">
                        {{ __("Profile") }}
                    </x-link.dropdown>
                    <x-link.dropdown wire:navigate href="{{ route('profile.show') }}">
                        {{ __("Profile") }}
                    </x-link.dropdown>
                    <x-link.dropdown wire:navigate href="{{ route('profile.show') }}">
                        {{ __("Profile") }}
                    </x-link.dropdown>
                    <div class="border border-l border-primary/30"></div>
                    <!-- Authentication -->
                    <form method="POST"
                          action="{{ route("logout") }}"
                          x-data
                    >
                        @csrf

                        <x-link.dropdown href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();"
                        >
                            {{ __("Log Out") }}
                        </x-link.dropdown>
                    </form>
                </x-slot>
            </x-dropdown>
            <x-switchable-theme/>
        </div>
    </div>
</nav>
