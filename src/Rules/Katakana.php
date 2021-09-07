<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Rules;

use Illuminate\Contracts\Validation\Rule;

class Katakana implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/\A[ァ-ヶー]+\z/u', $value);
    }

    public function message()
    {
        return ':attribute はカタカナでなければなりません。';
    }
}
