<?php

namespace Ragebee\FishpondRecord;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Ragebee\FishpondRecord\BetRecordInterface;
use Ragebee\FishpondRecord\DisplayDataInterface;

class DisplayData implements DisplayDataInterface
{
    public $betRecord;

    public $trans;

    public $language;

    public function __construct(BetRecordInterface $betRecord, $language = self::ZH_CN)
    {
        $this->betRecord = $betRecord;

        $loader = new FileLoader(new Filesystem(), __DIR__ . '/lang');
        $trans = new Translator($loader, $language);
        if ($language !== self::EN) {
            $trans->setFallback(self::EN);
        }

        $this->trans = $trans;

        $this->language = $language;
    }

    public function toArray(): array
    {
        return [
            [
                'Name' => $this->trans->get('*.bet_id'),
                'Value' => $this->betRecord->getId(),
            ],
            [
                'Name' => $this->trans->get('*.bet_record_status'),
                'Value' => $this->statusCodeToString($this->betRecord),
            ],
            [
                'Name' => $this->trans->get('*.bet_time'),
                'Value' => $this->betRecord->getCreatedAt()->setTimezone("+08:00")->toDateTimeString(),
            ],
            [
                'Name' => $this->trans->get('*.last_update_time'),
                'Value' => $this->betRecord->getUpdatedAt() ? $this->betRecord->getUpdatedAt()->setTimezone("+08:00")->toDateTimeString() : '',
            ],
            [
                'Name' => $this->trans->get('*.bet_amount'),
                'Value' => $this->betRecord->getBetAmount(),
            ],
            [
                'Name' => $this->trans->get('*.effective_bet_amount'),
                'Value' => $this->betRecord->getValidBetAmount(),
            ],
            [
                'Name' => $this->trans->get('*.payment'),
                'Value' => $this->betRecord->getPayment(),
            ],
        ];
    }

    protected function statusCodeToString(BetRecordInterface $betRecord): string
    {
        return $this->trans->get('bet-record.' . $betRecord->getStatus());
    }
}
