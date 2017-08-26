<?php

namespace bobkosse\eBoekhouden\ValueObjects;

/**
 * Class Date
 * @package bobkosse\eBoekhouden\ValueObjects
 */
class Date {

    /**
     * @var
     */
    private $date;

    /**
     * @var
     */
    private $errorMessage;

    /**
     * @var
     */
    private $errorCode;

    /**
     * Date constructor.
     * @param $date
     * @throws \Exception
     */
    public function __construct($date)
    {
        if($date === null || $date === "") {
            $this->setError("Date is a required value", 100);
            throw new \Exception($this->errorMessage, $this->errorCode);
        }

        if($this->checkDateValues($date)){
            $this->date = $date;
            return;
        }
        throw new \Exception($this->errorMessage, $this->errorCode);
    }

    /**
     * @param $date
     * @return bool
     */
    private function checkDateValues($date)
    {
        if($this->checkValidDateFormat($date) && $this->checkValidYearValue($date)) {
            return true;
        }
        return false;
    }

    /**
     * @param $date
     * @return bool
     */
    private function checkValidDateFormat($date)
    {
        list($y, $m, $d) = explode("-", $date);
        if(checkdate($m, $d, $y)){
            return true;
        }
        $this->setError("DateFormat incorrect for value: " . $date, 101);
        return false;
    }

    /**
     * @param $date
     * @return bool
     */
    private function checkValidYearValue($date)
    {
        list($y, $m, $d) = explode("-", $date);

        if($y < 1980) {
            $this->setError("Year must be greater or equal to 1980", 102);
            return false;
        }

        if($y > 2049) {
            $this->setError("Year must be less or equal to 2049", 103);
            return false;
        }
        return true;
    }

    /**
     * @param $message
     * @param $code
     */
    private function setError($message, $code)
    {
        $this->errorMessage = $message;
        $this->errorCode = $code;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->date;
    }
}