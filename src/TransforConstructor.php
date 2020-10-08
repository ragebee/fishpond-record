<?php
namespace Ragebee\FishpondRecord;

class TransforConstructor
{
    protected $trans;
    public function __construct($trans)
    {
        $this->trans = $trans;
    }
    public function set($name, $value)
    {
        $result = [
            'Name' => $this->trans->get($name),
            'Value' => $this->trans->get($value),
        ];

        return $result;
    }
}
