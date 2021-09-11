<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static convertKana(mixed $value)
 */
class Japanese extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'shibuyakosuke.laravel.japanese';
    }
}