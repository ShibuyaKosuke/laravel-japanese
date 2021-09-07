<?php

namespace ShibuyaKosuke\LaravelJapanesePackage;

use Illuminate\Contracts\Foundation\Application;

class Japanese
{
    /**
     * @var Application
     */
    private Application $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}
