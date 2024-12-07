<aside
    class="fixed top-2 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-menu/90 border-r border-orange-500/30 md:translate-x-0"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-menu/90">
        <ul class="space-y-2">
            <li>
                <x-admin.sidebar-menuitem href="#">
                    <svg aria-hidden="true"
                         class="w-6 h-6 text-light transition duration-75 group-hover:text-dark dark:group-hover:text-light"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Overview</span>
                </x-admin.sidebar-menuitem>
            </li>
            <li>
                <button type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-light rounded-lg transition duration-75 group hover:bg-dark/90 focus:bg-dark/90 focus:outline-none"
                        aria-controls="dropdown-users"
                        data-collapse-toggle="dropdown-users"
                >
                    <svg aria-hidden="true"
                         class="flex-shrink-0 w-6 h-6 text-light transition duration-75 group-hover:text-white"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg"
                    >
                        <path fill-rule="evenodd"
                              d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                              clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                    <svg aria-hidden="true"
                         class="w-6 h-6"
                         fill="currentColor"
                         viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg"
                    >
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <ul id="dropdown-users" class="hidden py-2 space-y-2">
                    <li>
                        <x-admin.sidebar-menuitem href="{{ route('users.index') }}" class="pl-11">
                            Users list
                        </x-admin.sidebar-menuitem>
                    </li>
                    <li>
                        <x-admin.sidebar-menuitem href="#" class="pl-11">
                            Profile
                        </x-admin.sidebar-menuitem>
                    </li>
                    <li>
                        <x-admin.sidebar-menuitem href="#" class="pl-11">
                            Feed
                        </x-admin.sidebar-menuitem>
                    </li>
                    <li>
                        <x-admin.sidebar-menuitem href="#" class="pl-11">
                            Settings
                        </x-admin.sidebar-menuitem>
                    </li>

                </ul>
            </li>

        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-orange-500/30">

        </ul>
    </div>
</aside>
