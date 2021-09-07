<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hiragana implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/\A[ぁ-んー]+\z/u', $value);
    }

    public function message()
    {
        return ':attribute はひらがなでなければなりません。';
    }
}