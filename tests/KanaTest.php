<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Test;

use ShibuyaKosuke\LaravelJapanesePackage\Rules\Hiragana;
use ShibuyaKosuke\LaravelJapanesePackage\Rules\Kana;
use ShibuyaKosuke\LaravelJapanesePackage\Rules\Katakana;

class KanaTest extends TestCase
{
    /**
     * @var
     */
    protected $rule;

    public function setUp(): void
    {
        $this->rule = new Kana();
    }

    public function testValues()
    {
        $values = [
            ['あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわをんアイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨワヲン', true],
            ['がぎぐげござじずぜぞだぢづでどガギグゲゴザジズゼゾダヂヅデド', true],
            ['ぱぴぷぺぽパピプペポ', true],
            ['ぃぇぉぁぃゑゐいーんァィゥェォャュョヴヰ', true],
            ['すゝきスゝキ', true],
            ['いすゞイスゞ', true],
            ['カタカナ', true],
            ['ひらがな', true],
            ['アイウエオ日時', false],
            ['ABCDE', false],
            ['1234567890', false],
            ['ＡＢＣＤＥ', false],
            ['１２３４５６７８９０', false],
        ];

        foreach ($values as $item) {
            $this->passes($item[0], $item[1]);
        }
    }

    /**
     * @param mixed $value
     * @param bool $result
     */
    public function passes($value, bool $result)
    {
        self::assertEquals($result, $this->rule->passes($value, $value));
    }
}