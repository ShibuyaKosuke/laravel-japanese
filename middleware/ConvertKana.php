<?php

namespace App\Http\Middleware;

use ShibuyaKosuke\LaravelJapanesePackage\Middleware\ConvertKana as Middleware;

class ConvertKana extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
