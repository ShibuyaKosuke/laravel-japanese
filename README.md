# laravel-japanese

## インストール

```shell
composer require shibuyakosuke/laravel-japanese
```

## 設定ファイルの配置

```
php artisan vendor:publish --tag=japanese
```

## 機能

### Custom middleware

- POST された文字列を `mb_convert_kana()` を通し文字列を変換します。初期値のオプションは、`KVas` が指定されます。

#### 使用方法

`routes/*.php` での設定方法

```php
Route::middleware('japanese.kana')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
});
```

`app/Http/Kernel.php` での設定方法

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\ConvertKana::class, // 追記する
    ],

    'api' => [
        // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
```

### Custom validation rules

- `hiragana`
- `katakana`
- `kana`
- `jp_postalcode`
- `jp_phone`

### Custom Date helper

