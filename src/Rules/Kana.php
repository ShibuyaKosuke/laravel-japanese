<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Rules;

use Illuminate\Contracts\Validation\Rule;

class Kana implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool|int
     */
    public function passes($attribute, $value)
    {
        return preg_match('/\A[ぁ-んァ-ヶー]+\z/u', $value);
    }

    /**
     * @return string
     */
    public function message()
    {
        return ':attribute はひらがな・カタカナでなければなりません。';
    }
}
