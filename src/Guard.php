<?php


namespace Hamidrezaniazi\Laramist;


use Illuminate\Support\Facades\Config;

class Guard
{
    public static function getGuardClassName(): string
    {
        $userClassName = Config::get('auth.model');
        if (is_null($userClassName)) {
            $userClassName = \Hamidrezaniazi\Laramist\Tests\Model\User::class;
        }
        return $userClassName;
    }
}
