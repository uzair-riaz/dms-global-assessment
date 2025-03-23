<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Clear cache when a post is created, updated, or deleted
        static::created(function () {
            Cache::forget('posts.latest.100');
        });

        static::updated(function () {
            Cache::forget('posts.latest.100');
        });

        static::deleted(function () {
            Cache::forget('posts.latest.100');
        });
    }

    /**
     * Get the user that owns the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
