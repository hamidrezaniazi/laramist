<?php


namespace Hamidrezaniazi\Laramist\Models;


use Hamidrezaniazi\Laramist\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Contracts\Auth\Authenticatable as User;

class ModelHistory extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'changed' => 'array'
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
            $history = new self();
            $history->subject()->associate($subject);
            $history->causer()->associate($user);
            $history->{'changed'} = $subject->getChanges();
            $history->save();
        }
    }
}
