<?php

namespace bobkosse\eBoekhouden\ObjectValidation;


class BaseValidator
{
    /**
     * @param $fieldName
     * @param $fieldValue
     * @param $maxLenght
     * @param bool $isRequired
     * @throws \Exception
     */
    protected function checkFieldLength($fieldName, $fieldValue, $maxLenght, $isRequired = false)
    {
        if(strlen($fieldValue) > $maxLenght) {
            throw new \Exception('Field ' . $fieldName . ' may not exceed ' . $maxLenght . ' characters', 118);
        }

        if($isRequired) {
            if ($fieldValue == '' || $fieldValue == null) {
                throw new \Exception('Field ' . $fieldName . ' is a required field', 118);
            }
        }
    }
}