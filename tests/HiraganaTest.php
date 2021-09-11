<?php

namespace ShibuyaKosuke\LaravelJapanesePackage\Test;

use ShibuyaKosuke\LaravelJapanesePackage\Rules\Hiragana;

class HiraganaTest extends TestCase
{
    /**
     * @var
     */
    protected $rule;

    public function setUp(): void
    {
        $this->rule = new Hiragana();
    }

    public function testValues()
    {
        $values = [
            ['あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわをん', true],
            ['がぎぐげござじずぜぞだぢづでど', true],
            ['ぱぴぷぺぽ', true],
            ['ぃぇぉぁぃゑゐいーん', true],
            ['すゝき', true],
            ['いすゞ', true],
            ['カタカナ', false],
            ['ｶﾀｶﾅ', false],
            ['あいうえお日時', false],
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