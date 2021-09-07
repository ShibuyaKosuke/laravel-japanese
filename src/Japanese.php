<?php

namespace ShibuyaKosuke\LaravelJapanesePackage;

use Illuminate\Contracts\Config\Repository;

class Japanese
{
    /**
     * @var Repository
     */
    private Repository $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config->get('japanese');
    }
}
