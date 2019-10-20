<?php

namespace Hamidrezaniazi\Laramist\Tests\Model;

use Illuminate\Database\Eloquent\Model;
use Hamidrezaniazi\Laramist\Traits\ModelHistoryTrait;

class MockModel extends Model
{
    use ModelHistoryTrait;

    protected $fillable = ['first_field', 'second_field'];
}
