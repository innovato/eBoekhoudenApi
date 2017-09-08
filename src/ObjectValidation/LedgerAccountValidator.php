<?php

namespace bobkosse\eBoekhouden\ObjectValidation;


class LedgerAccountValidator extends BaseValidator
{
    protected function validateFields()
    {
        $this->checkFieldLength('code', $this->code, 10, true);
        $this->checkFieldLength('decription', $this->description, 50, true);
        $this->checkFieldLength('category', $this->category, 10, true);
        $this->checkCategory();
    }

    private function checkCategory()
    {
        $acceptedvalues = ['BAL', 'VW'];
        if(!in_array($this->category, $acceptedvalues)) {
            throw new \Exception('Catory must be BAL (Balance) or VW (Profit and Loss Account)', 112);
        }
    }

}