# laravel-japanese

## インストール

```shell
composer require shibuyakosuke/laravel-japanese
```

## 機能

### Custom middleware

- POST された文字列を `mb_convert_kana()` を通し文字列を変換します。初期値のオプションは、`KVas` が指定されます。

### Custom validation rules

- `hiragana`
- `katakana`
- `kana`
- `jp_postalcode`
- `jp_phone`

### Custom Date helper

