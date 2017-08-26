<?php
namespace bobkosse\eBoekhouden;

use bobkosse\eBoekhouden\ValueObjects\AccountLedgerId;
use bobkosse\eBoekhouden\ValueObjects\AccountLegderId;
use bobkosse\eBoekhouden\ValueObjects\Date;
use bobkosse\eBoekhouden\ValueObjects\InvoiceNumber;
use bobkosse\eBoekhouden\ValueObjects\RelationCode;

/**
 * Class eBoekhoudenConnect
 * @package bobkosse\eBoekhouden
 */
class eBoekhoudenConnect
{
    /**
     * @var
     */
    private $sessionId;

    /**
     * @var
     */
    private $securityCode2;

    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * eBoekhoudenConnect constructor.
     * @param $username
     * @param $securityCode1
     * @param $securityCode2
     * @throws \Exception
     */
    public function __construct($username, $securityCode1, $securityCode2)
    {
        try {
            $this->soapClient = new \SoapClient("https://soap.e-boekhouden.nl/soap.asmx?WSDL");

            $params = [
                "Username" => $username,
                "SecurityCode1" => $securityCode1,
                "SecurityCode2" => $securityCode2
            ];
            $response = $this->soapClient->__soapCall("OpenSession", array($params));
            $this->checkforerror($response, "OpenSessionResult");
            $this->sessionId = $response->OpenSessionResult->SessionID;
            $this->securityCode2 = $securityCode2;

        } catch(\SoapFault $soapFault) {
            throw new \Exception('<strong>Soap Exception:</strong> ' . $soapFault);
        }
    }

    /**
     * @throws \Exception
     */
    public function __destruct()
    {
        try {
            $params = array(
                "SessionID" => $this->sessionId
            );
            return $this->soapClient->__soapCall("CloseSession", array($params));
        } catch(\SoapFault $soapFault) {
            throw new \Exception('<strong>Soap Exception:</strong> ' . $soapFault);
        }
    }

    /**
     *
     */
    public function addInvoice()
    {

    }

    /**
     *
     */
    public function addLedgerAccount()
    {

    }

    /**
     *
     */
    public function addMutation()
    {

    }

    /**
     *
     */
    public function addRelation()
    {

    }

    /**
     * @param $dateFrom
     * @param $toDate
     * @param null $invoiceNumber
     * @param null $relationCode
     * @return mixed
     * @throws \Exception
     */
    public function getInvoices($dateFrom, $toDate, $invoiceNumber = null, $relationCode = null)
    {
        try {
            $dateFrom = new Date($dateFrom);
            $toDate = new Date($toDate);
            $invoiceNumber = new InvoiceNumber($invoiceNumber);
            $relationCode = new RelationCode($relationCode);

            $params = [
                "SecurityCode2" => $this->securityCode2,
                "SessionID" => $this->sessionId,
                "cFilter" => [
                    "Factuurnummer" => $invoiceNumber->__toString(),
                    "Relatiecode" => $relationCode->__toString(),
                    "DatumVan" => $dateFrom->__toString(),
                    "DatumTm" => $toDate->__toString()
                ]
            ];

            $response = $this->soapClient->__soapCall("GetFacturen", [$params]);

            $this->checkforerror($response, "GetFacturenResult");
            return $response->GetFacturenResult;
        } catch(\SoapFault $soapFault) {
            throw new \Exception('<strong>Soap Exception:</strong> ' . $soapFault);
        }
    }

    /**
     *
     */
    public function getLedgerAccounts($id = null, $code = null, $category = null)
    {
        try {
            $id = new AccountLedgerId($id);
            $code = ""; //$code;
            $category = ""; //$category;

            $params = [
                "SecurityCode2" => $this->securityCode2,
                "SessionID" => $this->sessionId,
                "cFilter" => [
                    "ID" => (string)$id->toInt(),
                    "Code" => $code,
                    "Categorie" => $category
                ]
            ];

            $response = $this->soapClient->__soapCall("GetGrootboekrekeningen", [$params]);

            $this->checkforerror($response, "GetGrootboekrekeningenResult");
            return $response->GetGrootboekrekeningenResult;
        } catch(\SoapFault $soapFault) {
            throw new \Exception('<strong>Soap Exception:</strong> ' . $soapFault);
        }
    }

    /**
     *
     */
    public function getMutations()
    {

    }

    /**
     *
     */
    public function getVacantPosts()
    {

    }

    /**
     *
     */
    public function getRelations()
    {

    }

    /**
     *
     */
    public function updateLedgerAccount()
    {

    }

    /**
     *
     */
    public function updateRelation()
    {

    }

    /**
     * @param $rawresponse
     * @param $sub
     */
    private function checkforerror($rawresponse, $sub)
    {
        if (isset($rawresponse->$sub->ErrorMsg->LastErrorCode)) {
            $LastErrorCode = $rawresponse->$sub->ErrorMsg->LastErrorCode;
            $LastErrorDescription = $rawresponse->$sub->ErrorMsg->LastErrorDescription;
            if ($LastErrorCode <> '') {
                echo '<strong>Er is een fout opgetreden:</strong><br>';
                echo $LastErrorCode . ': ' . $LastErrorDescription;
                exit();
            }
        }
    }
}