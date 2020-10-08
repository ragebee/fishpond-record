<?php

namespace Ragebee\FishpondRecord;

use Ragebee\Fishpond\Config;

trait BetRecordMethodTrait
{
    public function getBetRecordMethod(Config $config)
    {
        $class = str_replace('Adapter', 'BetRecordMethod', __CLASS__);

        return new $class($config);
    }
}
