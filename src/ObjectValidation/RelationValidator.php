<?php

namespace bobkosse\eBoekhouden\ObjectValidation;

/**
 * Class RelationValidator
 * @package bobkosse\eBoekhouden\ObjectValidation
 */
class RelationValidator extends BaseValidator
{
    /**
     *
     */
    protected function validateFields()
    {
        $this->checkCreationDate();
        $this->checkCompanyName();
        $this->checkCompanyPerson();
        $this->checkRelationCode();
        $this->checkSex();
        $this->checkFieldLength('address', $this->address, 150);
        $this->checkFieldLength('postalcode', $this->postalcode, 50);
        $this->checkFieldLength('city', $this->city, 50);
        $this->checkFieldLength('country', $this->country, 50);
        $this->checkFieldLength('address2', $this->address2, 100);
        $this->checkFieldLength('postalcode2', $this->postalcode2, 50);
        $this->checkFieldLength('city2', $this->city2, 50);
        $this->checkFieldLength('country2', $this->country2, 50);
        $this->checkFieldLength('phone', $this->phone, 50);
        $this->checkFieldLength('mobile', $this->mobile, 50);
        $this->checkFieldLength('fax', $this->fax, 50);
        $this->checkFieldLength('email', $this->email, 150);
        $this->checkFieldLength('vatregistrationnumber', $this->vatregistrationnumber, 50);
        $this->checkFieldLength('preamble', $this->preamble, 50);
        $this->checkFieldLength('iban', $this->iban, 50);
        $this->checkFieldLength('bic', $this->bic, 50);
        $this->checkFieldLength('freeField_1', $this->freeField_1, 100);
        $this->checkFieldLength('freeField_2', $this->freeField_2, 100);
        $this->checkFieldLength('freeField_3', $this->freeField_3, 100);
        $this->checkFieldLength('freeField_4', $this->freeField_4, 100);
        $this->checkFieldLength('freeField_5', $this->freeField_5, 100);
        $this->checkFieldLength('freeField_6', $this->freeField_6, 100);
        $this->checkFieldLength('freeField_7', $this->freeField_7, 100);
        $this->checkFieldLength('freeField_8', $this->freeField_8, 100);
        $this->checkFieldLength('freeField_9', $this->freeField_9, 100);
        $this->checkFieldLength('freeField_10', $this->freeField_10, 100);
        $this->checkFieldLength('ledgerAccount_id', $this->ledgerAccount_id, 100, true);
        $this->checkFieldLength('noEmail', $this->noEmail, 100, true);
        $this->checkFieldLength('newsletterGroupCount', $this->newsletterGroupCount, 100, true);
    }

    /**
     *
     */
    private function checkCreationDate()
    {
        if($this->creationDate === null || $this->creationDate === '') {
            $this->creationDate = date("Y-m-d");
        }
    }

    /**
     *
     */
    private function checkCompanyName()
    {
        if($this->companyName === null || $this->companyName === '') {
            if($this->companyPerson === 'person') {
                $this->companyName = $this->contact;
            } else {
                $this->companyName = "UNKNOWN";
            }
        }

        $this->checkFieldLength('companyName', $this->companyName, 100);
    }

    /**
     *
     */
    private function checkCompanyPerson()
    {
        if($this->companyPerson === 'person') {
            $this->contact = '';
            $this->companyPerson = 'P';
            return;
        }
        $this->companyPerson = 'C';
        return;
    }

    /**
     *
     */
    private function checkRelationCode()
    {
        if($this->relationCode === null || $this->relationCode === '') {
            $this->relationCode = substr($this->companyName, 0, 8) . date('mY');
        }

        $this->checkFieldLength('realtionCode', $this->relationCode, 15);
    }

    /**
     * @throws \Exception
     */
    private function checkSex()
    {
        $acceptedvalues = ['M', 'm', 'V', 'v', ''];
        if(!in_array($this->sex, $acceptedvalues)) {
            throw new \Exception('Sex must be empty string, null, M or V', 112);
        }
    }

}