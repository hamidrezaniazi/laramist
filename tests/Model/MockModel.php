<?php


namespace Hamidrezaniazi\Laramist\Tests\Model;


use Hamidrezaniazi\Laramist\Traits\ModelHistoryTrait;
use Illuminate\Database\Eloquent\Model;

class MockModel extends Model
{
    use ModelHistoryTrait;

    protected $fillable = ['first_field', 'second_field'];
}
