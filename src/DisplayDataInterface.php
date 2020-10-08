<?php

namespace Ragebee\FishpondRecord;

interface DisplayDataInterface
{
    /**
     * zh = 簡體中文
     * tw = 繁體中文
     * en = 英文
     */
    const ZH_CN = "zh";
    const ZH_TW = "tw";
    const EN = "en";

    public function toArray(): array;
}
