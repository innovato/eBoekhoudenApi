<?php
namespace bobkosse\eBoekhouden;

use bobkosse\eBoekhouden\ValueObjects\Date;
use bobkosse\eBoekhouden\ValueObjects\InvoiceNumber;

class eBoekhoudenConnect
{
    private $sessionId;

    private $securityCode2;

    private $soapClient;

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

    public function addInvoice()
    {

    }

    public function addLedgerAccount()
    {

    }

    public function addMutation()
    {

    }

    public function addRelation()
    {

    }

    public function getInvoices($dateFrom, $toDate, $invoiceNumber = null, $relationCode = null)
    {

        if(strlen($relationCode) > 15) {
            throw new \Exception("RelationCode may have a string length of maximal 15 characters");
        }

        try {
            $dateFrom = new Date($dateFrom);
            $toDate = new Date($toDate);
            $invoiceNumber = new InvoiceNumber($invoiceNumber);

            $params = [
                "SecurityCode2" => $this->securityCode2,
                "SessionID" => $this->sessionId,
                "cFilter" => [
                    "Factuurnummer" => $invoiceNumber->__toString(),
                    "Relatiecode" => (string)$relationCode,
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

    public function getLedgerAccounts()
    {

    }

    public function getMutations()
    {

    }

    public function getVacantPosts()
    {

    }

    public function getRelations()
    {

    }

    public function updateLedgerAccount()
    {

    }

    public function updateRelation()
    {

    }

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