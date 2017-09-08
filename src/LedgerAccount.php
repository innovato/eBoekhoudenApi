<?php

namespace bobkosse\eBoekhouden;

use bobkosse\eBoekhouden\ObjectValidation\LedgerAccountValidator;

class LedgerAccount extends LedgerAccountValidator
{
    protected $code;
    protected $description;
    protected $category;

    /**
     * @param mixed $code
     * @return LedgerAccount
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param mixed $description
     * @return LedgerAccount
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $category
     * @return LedgerAccount
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array
     */
    public function getLedgerAccountArray()
    {
        $this->validateFields();

        return [
            'ID' => '0',
            'Code' => $this->code,
            'Omschrijving' => $this->description,
            'Categorie' => $this->category
        ];
    }
}