<?php

namespace Ragebee\FishpondRecord\DisplayData;

use Ragebee\FishpondRecord\DisplayDataInterface;

interface MultilingualInterface
{
    public function translatorLoad(DisplayDataInterface $displayData);
}
