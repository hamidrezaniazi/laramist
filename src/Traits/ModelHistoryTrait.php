<?php


namespace Hamidrezaniazi\Laramist\Traits;


use Hamidrezaniazi\Laramist\Models\ModelHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

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
