<?php

namespace bobkosse\eBoekhouden\ValueObjects;

/**
 * Class AccountLedgerId
 * @package bobkosse\eBoekhouden\ValueObjects
 */
class AccountLedgerId {

    /**
     * @var
     */
    private $accountLedgerId;

    /**
     * InvoiceNumber constructor.
     * @param $accountLedgerId
     * @throws \Exception
     */
    public function __construct($accountLedgerId = null)
    {
        if(is_int($accountLedgerId) || $accountLedgerId === null) {
            $this->accountLedgerId = $accountLedgerId;
            return;
        }
        throw new \Exception("Account Ledger Id must be integer or null", 106);
    }

    /**
     * @return mixed
     */
    public function toInt()
    {
        if($this->accountLedgerId == 0) {
            return null;
        }
        return (int) $this->accountLedgerId;
    }
}