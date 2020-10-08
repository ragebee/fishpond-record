<?php

namespace Ragebee\FishpondRecord;

use Ragebee\FishpondRecord\DisplayDataInterface;

abstract class DisplayDataDecorator implements DisplayDataInterface
{
    protected $displayData;

    protected $betRecord;

    public function __construct(DisplayDataInterface $displayData)
    {
        $this->displayData = $displayData;

        $this->betRecord = $this->displayData->betRecord;
    }
}
