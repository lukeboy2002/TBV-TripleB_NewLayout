<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'comment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderByDesc('created_at');
    }

    public function getFormattedDate()
    {
        return $this->created_at->format('j F Y');
        //        // Stel de locale in op Nederlands
        //        Carbon::setLocale('nl');
        //
        //        // Veronderstel dat published_at een datum string is
        //        $publishedAt = Carbon::parse($this->published_at);
        //
        //        // Gebruik translatedFormat om de maand in het Nederlands te krijgen
        //        return $publishedAt->translatedFormat('j F Y');

    }
}
