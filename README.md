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

`config/japanese.php` でデフォルトの変換設定を変更することができます。

```php
'convert' => [
    /*
     * mb_convert_kana() のオプション指定にしたがって、文字列を変換します。
     * null を指定した場合には、何も変換しません。
     * @see https://www.php.net/manual/ja/function.mb-convert-kana.php
     */
    'option' => 'KVas'
]
```

### Custom validation rules

- `hiragana`
- `katakana`
- `kana`

### Custom Date helper

