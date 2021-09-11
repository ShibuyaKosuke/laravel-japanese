<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Rules;

use Illuminate\Contracts\Validation\Rule;

class Katakana implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool|int
     */
    public function passes($attribute, $value)
    {
        return preg_match('/\A[ァ-ヶー]+\z/u', $value);
    }

    /**
     * @return string
     */
    public function message()
    {
        return ':attribute はカタカナでなければなりません。';
    }
}
