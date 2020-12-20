<?php

namespace Ragebee\FishpondRecord;

use Ragebee\Fishpond\RecordInterface;

interface BetRecordInterface extends RecordInterface
{
    const STATUS_OPEN = 'OPEN'; // 此注单已被接受，但还未结算。
    const STATUS_CANCELED = 'CANCELLED'; // 此注单已被取消。
    const STATUS_SETTLED = 'SETTLED'; // 此注单已结算。
}
