<?php


namespace Hamidrezaniazi\Laramist;


use Illuminate\Support\Facades\Config;

class Guard
{
    /**
     * Return guard model class name
     *
     * @return string
     */
    public static function getGuardClassName(): string
    {
        $userClassName = Config::get('auth.model');
        if (is_null($userClassName)) {
            $userClassName = \Hamidrezaniazi\Laramist\Tests\Model\User::class;
        }
        return $userClassName;
    }
}
