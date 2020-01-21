<?php

namespace Hamidrezaniazi\Laramist\Models;

use Hamidrezaniazi\Laramist\Guard;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ModelHistory extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'changed' => 'array',
    ];

    /**
     * @return MorphTo
     */
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function causer(): BelongsTo
    {
        return $this->belongsTo(Guard::getGuardClassName(), 'causer_id');
    }

    /**
     * @param Model $subject
     * @param User|null $user
     * @return void
     */
    public static function logChanges(Model $subject, ?User $user): void
    {
        if ($subject->wasChanged()) {
            $changed = $subject->getChanges();
            unset($changed['updated_at']);
            $history = new self();
            $history->subject()->associate($subject);
            $history->causer()->associate($user);
            $history->changed = $changed;
            $history->save();
        }
    }
}
