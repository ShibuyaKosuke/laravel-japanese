<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Providers;

use App\Http\Middleware\ConvertKana;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as ServiceBase;
use ShibuyaKosuke\LaravelJapanesePackage\Japanese;
use ShibuyaKosuke\LaravelJapanesePackage\Middleware\ConvertKana as ConvertKanaBase;

class ServiceProvider extends ServiceBase
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind('shibuyakosuke.laravel.japanese', function (Application $app) {
            $config = $app['config'];
            return new Japanese($config);
        });

        $this->middleware();
        $this->publishFiles();
    }

    /**
     * @return void
     */
    protected function middleware(): void
    {
        /** @var Router $router */
        $router = $this->app['router'];

        $path = $this->app->path('Http/Middleware/ConvertKana.php');
        $convertKana = file_exists($path) ? ConvertKana::class : ConvertKanaBase::class;

        $router->aliasMiddleware('convert.kana', $convertKana);

        if ($this->app['config']->get('japanese.convert.enabled')) {
            $router->pushMiddlewareToGroup('web', $convertKana);
        }
    }

    /**
     * @return void
     */
    protected function publishFiles(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/japanese.php' => $this->app->configPath('japanese.php'),
            __DIR__ . '/../../middleware/ConvertKana.php' => $this->app->path('Http/Middleware/ConvertKana.php'),
        ], 'japanese');
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
