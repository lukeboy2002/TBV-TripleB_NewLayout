<div class="relative overflow-x-auto">
    <x-card.team>
        @foreach($users as $user)
            <div class="flex">
                <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->username }}"
                     class="h-full sm:h-80 min-w-60 rounded-t-lg sm:rounded-t-none sm:rounded-tl-lg">
                <div class="ml-4 w-full space-y-4 sm:space-y-6">
                    <div class="pt-6 sm:pt-0">
                        <a href="#"
                           class="text-2xl font-black text-primary">{{ ucfirst($user->username) }}</a>
                    </div>

                    <div class="w-full space-y-2 text-sm text-dark dark:text-light md:hidden">
                        <div class="flex justify-between">
                            <div class="w-1/2">Points</div>
                            <div class="w-1/2">{{ $user->total_points }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="w-1/2">Played games</div>
                            <div class="w-1/2">{{ $user->total_games_played }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="w-1/2">Games won</div>
                            <div class="w-1/2">{{ $user->total_wins }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="w-1/2">Games cup</div>
                            <div class="w-1/2">{{ $user->total_cups }}</div>
                        </div>
                    </div>
                    <div class="hidden md:block w-full space-y-2 text-sm text-gray-700 dark:text-white">
                        <div class="flex justify-between">
                            <div class="w-1/2">Points</div>
                            <div class="w-1/2">{{ $user->total_points }}</div>
                            <div class="w-1/2">Played games</div>
                            <div class="w-1/2">{{ $user->total_games_played }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="w-1/2">Games won</div>
                            <div class="w-1/2">{{ $user->total_wins }}</div>
                            <div class="w-1/2">Games cup</div>
                            <div class="w-1/2">{{ $user->total_cups }}</div>
                        </div>
                    </div>
                    @if($user->biography !== null)
                        <div class="pb-4">
                            <p class="text-2xl font-black text-primary">Biography</p>
                            <main class="prose prose-sm max-w-none text-dark dark:text-light">
                                {!! $user->biography !!}
                            </main>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="flex justify-end pb-4">
            {{ $users->links() }}
        </div>
    </x-card.team>

</div>