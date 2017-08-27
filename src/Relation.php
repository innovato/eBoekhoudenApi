<?php

namespace bobkosse\eBoekhouden;

class Relation
{
    private $id;                    // Mandatory
    private $creationDate;          // Mandatory
    private $relationCode;
    private $companyName;
    private $contact;
    private $sex;
    private $address;
    private $postalcode;
    private $city;
    private $country;
    private $address2;
    private $postalcode2;
    private $city2;
    private $country2;
    private $phone;
    private $mobile;
    private $fax;
    private $email;
    private $website;
    private $note;
    private $bankacocunt;
    private $giroaccount;
    private $vatregistrationnumber;
    private $preamble;
    private $iban;
    private $bic;
    private $companyPerson;
    private $freeField_1;
    private $freeField_2;
    private $freeField_3;
    private $freeField_4;
    private $freeField_5;
    private $freeField_6;
    private $freeField_7;
    private $freeField_8;
    private $freeField_9;
    private $freeField_10;
    private $memberAdministration = 0;
    private $ledgerAccount_id;          // Mandatory
    private $noEmail;                   // Mandatory
    private $newsletterGroupCount;      // Mandatory

    /**
     * @param mixed $id
     * @return Relation
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $creationDate
     * @return Relation
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @param mixed $relationCode
     * @return Relation
     */
    public function setRelationCode($relationCode)
    {
        $this->relationCode = $relationCode;
        return $this;
    }

    /**
     * @param mixed $companyName
     * @return Relation
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @param mixed $contact
     * @return Relation
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @param mixed $sex
     * @return Relation
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @param mixed $address
     * @return Relation
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param mixed $postalcode
     * @return Relation
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
        return $this;
    }

    /**
     * @param mixed $city
     * @return Relation
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param mixed $country
     * @return Relation
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param mixed $address2
     * @return Relation
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @param mixed $postalcode2
     * @return Relation
     */
    public function setPostalcode2($postalcode2)
    {
        $this->postalcode2 = $postalcode2;
        return $this;
    }

    /**
     * @param mixed $city2
     * @return Relation
     */
    public function setCity2($city2)
    {
        $this->city2 = $city2;
        return $this;
    }

    /**
     * @param mixed $country2
     * @return Relation
     */
    public function setCountry2($country2)
    {
        $this->country2 = $country2;
        return $this;
    }

    /**
     * @param mixed $phone
     * @return Relation
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param mixed $mobile
     * @return Relation
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @param mixed $fax
     * @return Relation
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @param mixed $email
     * @return Relation
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $website
     * @return Relation
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @param mixed $note
     * @return Relation
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param mixed $bankacocunt
     * @return Relation
     */
    public function setBankacocunt($bankacocunt)
    {
        $this->bankacocunt = $bankacocunt;
        return $this;
    }

    /**
     * @param mixed $giroaccount
     * @return Relation
     */
    public function setGiroaccount($giroaccount)
    {
        $this->giroaccount = $giroaccount;
        return $this;
    }

    /**
     * @param mixed $vatregistrationnumber
     * @return Relation
     */
    public function setVatregistrationnumber($vatregistrationnumber)
    {
        $this->vatregistrationnumber = $vatregistrationnumber;
        return $this;
    }

    /**
     * @param mixed $preamble
     * @return Relation
     */
    public function setPreamble($preamble)
    {
        $this->preamble = $preamble;
        return $this;
    }

    /**
     * @param mixed $iban
     * @return Relation
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * @param mixed $bic
     * @return Relation
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * @param mixed $companyPerson
     * @return Relation
     */
    public function setCompanyPerson($companyPerson)
    {
        $this->companyPerson = $companyPerson;
        return $this;
    }

    /**
     * @param mixed $freeField_1
     * @return Relation
     */
    public function setFreeField1($freeField_1)
    {
        $this->freeField_1 = $freeField_1;
        return $this;
    }

    /**
     * @param mixed $freeField_2
     * @return Relation
     */
    public function setFreeField2($freeField_2)
    {
        $this->freeField_2 = $freeField_2;
        return $this;
    }

    /**
     * @param mixed $freeField_3
     * @return Relation
     */
    public function setFreeField3($freeField_3)
    {
        $this->freeField_3 = $freeField_3;
        return $this;
    }

    /**
     * @param mixed $freeField_4
     * @return Relation
     */
    public function setFreeField4($freeField_4)
    {
        $this->freeField_4 = $freeField_4;
        return $this;
    }

    /**
     * @param mixed $freeField_5
     * @return Relation
     */
    public function setFreeField5($freeField_5)
    {
        $this->freeField_5 = $freeField_5;
        return $this;
    }

    /**
     * @param mixed $freeField_6
     * @return Relation
     */
    public function setFreeField6($freeField_6)
    {
        $this->freeField_6 = $freeField_6;
        return $this;
    }

    /**
     * @param mixed $freeField_7
     * @return Relation
     */
    public function setFreeField7($freeField_7)
    {
        $this->freeField_7 = $freeField_7;
        return $this;
    }

    /**
     * @param mixed $freeField_8
     * @return Relation
     */
    public function setFreeField8($freeField_8)
    {
        $this->freeField_8 = $freeField_8;
        return $this;
    }

    /**
     * @param mixed $freeField_9
     * @return Relation
     */
    public function setFreeField9($freeField_9)
    {
        $this->freeField_9 = $freeField_9;
        return $this;
    }

    /**
     * @param mixed $freeField_10
     * @return Relation
     */
    public function setFreeField10($freeField_10)
    {
        $this->freeField_10 = $freeField_10;
        return $this;
    }

    /**
     * @param int $memberAdministration
     * @return Relation
     */
    public function setMemberAdministration($memberAdministration)
    {
        $this->memberAdministration = $memberAdministration;
        return $this;
    }

    /**
     * @param mixed $ledgerAccount_id
     * @return Relation
     */
    public function setLedgerAccountId($ledgerAccount_id)
    {
        $this->ledgerAccount_id = $ledgerAccount_id;
        return $this;
    }

    /**
     * @param mixed $noEmail
     * @return Relation
     */
    public function setNoEmail($noEmail)
    {
        $this->noEmail = $noEmail;
        return $this;
    }

    /**
     * @param mixed $newsletterGroupCount
     * @return Relation
     */
    public function setNewsletterGroupCount($newsletterGroupCount)
    {
        $this->newsletterGroupCount = $newsletterGroupCount;
        return $this;
    }

    public function getEboekhoudenArray()
    {
        return [
            "ID" => $this->id,
            "AddDatum" => $this->creationDate,
            "Code" => $this->relationCode,
            "Bedrijf" => $this->companyName,
            "Contactpersoon" => $this->contact,
            "Geslacht" => $this->sex,
            "Adres" => $this->address,
            "Postcode" => $this->postalcode,
            "Plaats" => $this->city,
            "Land" => $this->country,
            "Adres2" => $this->address2,
            "Postcode2" => $this->postalcode2,
            "Plaats2" => $this->city2,
            "Land2" => $this->country2,
            "Telefoon" => $this->phone,
            "GSM" => $this->mobile,
            "FAX" => $this->fax,
            "Email" => $this->email,
            "Site" => $this->website,
            "Notitie" => $this->note,
            "Bankrekening" => $this->bankacocunt,
            "Girorekening" => $this->giroaccount,
            "BTWNummer" => $this->vatregistrationnumber,
            "Aanhef" => $this->preamble,
            "IBAN" => $this->iban,
            "BIC" => $this->bic,
            "BP" => $this->companyPerson,
            "Def1" => $this->freeField_1,
            "Def2" => $this->freeField_2,
            "Def3" => $this->freeField_3,
            "Def4" => $this->freeField_4,
            "Def5" => $this->freeField_5,
            "Def6" => $this->freeField_6,
            "Def7" => $this->freeField_7,
            "Def8" => $this->freeField_8,
            "Def9" => $this->freeField_9,
            "Def10" => $this->freeField_10,
            "LA" => $this->memberAdministration,
            "Gb_ID" => $this->ledgerAccount_id,
            "GeenEmail" => $this->noEmail,
            "NieuwsbriefgroepenCount" => $this->newsletterGroupCount,
        ];
    }

}