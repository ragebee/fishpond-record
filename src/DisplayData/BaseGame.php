<?php

namespace Ragebee\FishpondRecord\DisplayData;

use Ragebee\FishpondRecord\DisplayData;
use Ragebee\FishpondRecord\DisplayDataDecorator;

abstract class BaseGame extends DisplayDataDecorator
{
    protected $sourceBetRecord;

    public function __construct(DisplayData $displayData)
    {
        parent::__construct($displayData);

        $this->sourceBetRecord = $this->betRecord->source;
    }
}
