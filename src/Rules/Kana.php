<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Rules;

use Illuminate\Contracts\Validation\Rule;

class Kana implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/\A[ぁ-んァ-ヶー]+\z/u', $value);
    }

    public function message()
    {
        return ':attribute はひらがな・カタカナでなければなりません。';
    }
}