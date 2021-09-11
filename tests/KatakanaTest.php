<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Test;

use ShibuyaKosuke\LaravelJapanesePackage\Rules\Hiragana;
use ShibuyaKosuke\LaravelJapanesePackage\Rules\Katakana;

class KatakanaTest extends TestCase
{
    /**
     * @var
     */
    protected $rule;

    public function setUp(): void
    {
        $this->rule = new Katakana();
    }

    public function testValues()
    {
        $values = [
            ['アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨワヲン', true],
            ['ガギグゲゴザジズゼゾダヂヅデド', true],
            ['パピプペポ', true],
            ['ァィゥェォャュョ', true],
            ['スゝキ', true],
            ['イスゞ', true],
            ['カタカナ', true],
            ['ひらがな', false],
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