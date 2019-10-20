<?php

namespace Hamidrezaniazi\Laramist\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Hamidrezaniazi\Laramist\Models\ModelHistory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ModelHistoryTrait
{
    public static function bootModelHistoryTrait()
    {
        static::updated(function (Model $model) {
            ModelHistory::logChanges($model, Auth::user());
        });
    }

    /**
     * @return MorphMany
     */
    public function modelHistories(): MorphMany
    {
        return $this->morphMany(ModelHistory::class, 'subject');
    }
}
