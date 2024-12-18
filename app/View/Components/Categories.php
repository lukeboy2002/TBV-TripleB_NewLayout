<?php

namespace App\View\Components;

use App\Models\Category;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Categories extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::query()
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->where('published_at', '<=', Carbon::now())
            ->select('categories.*', DB::raw('count(*) as total'))
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->get();

        return view('components.categories', [
            'categories' => $categories,
        ]);
    }
}
