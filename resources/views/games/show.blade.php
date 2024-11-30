<x-app-layout title="Show game">
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/newgame.png") }}"
             alt="Background Image"
             class="absolute inset-0 w-full h-124 object-cover object-bottom"
        />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide text-xl md:text-2xl uppercase">
                Game
            </h3>
            <h1 class="text-5xl font-heading font-black tracking-wider uppercase text-white">
                TBV-TripleB
            </h1>
        </div>
    </x-slot>

    <div class="sm:flex justify-between gap-4">
        <x-card.default class="w-full sm:w-2/3">
            <table class="w-full text-sm text-left rtl:text-right text-dark dark:text-light">
                <thead class="text-xs text-dark uppercase bg-light dark:bg-dark dark:text-light">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Points
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($game->user_scores as $score)
                    <tr class="bg-light border-b  dark:bg-dark border-dark dark:border-light dark:hover:bg-[#232221] hover:bg-gray-300">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-dark whitespace-nowrap dark:text-white">
                            {{ ucfirst($score->username) }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $score->points }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-card.default>
        <x-card.default class="w-full sm:w-1/3 mt-4 sm:mt-0 space-y-6">
            <div>
                <x-heading>Game Winner <i class="ri-medal-line"></i></x-heading>
                <p>
                    @if($game->game_winner)
                        {{ ucfirst($game->game_winner->username) }}
                    @else
                        No winner yet
                    @endif
                </p>
            </div>
            <div>
                <x-heading>Cup Winner <i class="ri-award-line"></i></x-heading>
                <p>
                    @if($game->cup_winner)
                        {{ ucfirst($game->cup_winner->username) }}
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $game->image) }}" alt=""/>
                    @else
                        No cup winner this game
                    @endif
                </p>
            </div>
        </x-card.default>
    </div>

    <x-slot name="side">
        To be continued
    </x-slot>
</x-app-layout>