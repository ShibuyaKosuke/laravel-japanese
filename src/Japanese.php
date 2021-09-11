<?php

namespace ShibuyaKosuke\LaravelJapanesePackage;

use Illuminate\Contracts\Config\Repository;

class Japanese
{
    /**
     * @var Repository
     */
    protected $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function convertKana($value)
    {
        $option = $this->config->get('japanese.convert.option', 'KVas');
        return is_string($value) ? mb_convert_kana($value, $option) : $value;
    }
}
