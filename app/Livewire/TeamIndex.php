<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TeamIndex extends Component
{
    use WithPagination;

    public function render()
    {
        // Retrieve paginated users with their scores
        $users = DB::table('users')
            ->select(
                'users.username',
                'profiles.image',
                DB::raw('COALESCE(SUM(points.points), 0) AS total_points'),
                DB::raw('COALESCE(SUM(CASE WHEN games.winner_id = users.id THEN 1 ELSE 0 END), 0) AS total_wins'),
                DB::raw('COALESCE(SUM(CASE WHEN games.cup_winner_id = users.id THEN 1 ELSE 0 END), 0) AS total_cups'),
                DB::raw('COUNT(game_user.game_id) AS total_games_played')
            )
            ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id') // Join profiles
            ->leftJoin('game_user', 'game_user.user_id', '=', 'users.id')
            ->leftJoin('games', 'game_user.game_id', '=', 'games.id')
            ->leftJoin('points', function ($join) {
                $join->on('points.user_id', '=', 'users.id')
                    ->on('points.game_id', '=', 'games.id');
            })
            ->whereIn('users.id', User::role('member')->pluck('id'))
            ->groupBy('users.id', 'profiles.image') // Include profiles.image in groupBy
            ->simplePaginate(1); // Adjust the number of items per page as needed

        return view('livewire.team-index', [
            'users' => $users,
        ]);
    }
}
