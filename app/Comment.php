<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Comment
 * @property int $id
 * @property int $user_id
 * @property string $commentable_type
 * @property int $commentable_id
 * @property string $content
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\Comment|null $parent
 * @property-read Collection|\App\Comment[] $replies
 * @property-read int|null $replies_count
 * @property-read User $user
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $with = ['user'];
    protected $fillable = ['content', 'commentable_type', 'commentable_id', 'parent_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function replies(): HasMany
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function isReply(): bool
    {
        return isset($this->parent);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder): void {
            $builder->orderBy('created_at', 'asc');
        });
    }
}
