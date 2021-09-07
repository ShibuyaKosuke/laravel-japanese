<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as ServiceBase;
use Shibuyakosuke\LaravelJapanesePackage\Japanese;
use ShibuyaKosuke\LaravelJapanesePackage\Middleware\ConvertKana;

class ServiceProvider extends ServiceBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        /** @var Router $router */
        $router = $this->app['router'];

        $router->aliasMiddleware('convert.kana', ConvertKana::class);

        $router->pushMiddlewareToGroup('web', ConvertKana::class);

        $this->app->bind('shibuyakosuke.laravel.japanese', function (Application $app) {
            $config = $app['config'];
            return new Japanese($config);
        });
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [
            'shibuyakosuke.laravel.japanese'
        ];
    }
}
