<?php
namespace bobkosse\eBoekhouden;

use bobkosse\eBoekhouden\ValueObjects\AccountLedgerCategory;
use bobkosse\eBoekhouden\ValueObjects\AccountLedgerCode;
use bobkosse\eBoekhouden\ValueObjects\MutationId;
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
     * @param null $id
     * @param null $accountLedgerCode
     * @param null $category
     * @return mixed
     * @throws \Exception
     */
    public function getLedgerAccounts($id = null, $accountLedgerCode = null, $category = null)
    {
        try {
            $id = new MutationId($id);
            $accountLedgerCode = new AccountLedgerCode($accountLedgerCode);
            $category = new AccountLedgerCategory($category);

            $params = [
                "SecurityCode2" => $this->securityCode2,
                "SessionID" => $this->sessionId,
                "cFilter" => [
                    "ID" => (string)$id->toInt(),
                    "Code" => $accountLedgerCode->__toString(),
                    "Categorie" => $category->__toString()
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
     * @param $dateFrom
     * @param $toDate
     * @return mixed
     */
    public function getMutationsByPeriod($dateFrom, $toDate)
    {
        $dateFrom = new Date($dateFrom);
        $toDate = new Date($toDate);

        $params = [
            "SecurityCode2" => $this->securityCode2,
            "SessionID" => $this->sessionId,
            "cFilter" => [
                "MutatieNr" => 0,
                "MutatieNrVan" => "",
                "MutatieNrTm" => "",
                "Factuurnummer" => "",
                "DatumVan" => $dateFrom->__toString(),
                "DatumTm" => $toDate->__toString()
            ]
        ];

        return $this->performGetMutationsRequest($params);
    }


    public function getMutationsByMutationId($mutationId)
    {
        $mutationId = new MutationId($mutationId);

        $params = [
            "SecurityCode2" => $this->securityCode2,
            "SessionID" => $this->sessionId,
            "cFilter" => [
                "MutatieNr" => $mutationId->toInt(),
                "MutatieNrVan" => "",
                "MutatieNrTm" => "",
                "Factuurnummer" => "",
                "DatumVan" => "1980-01-01",
                "DatumTm" => "2049-12-31"
            ]
        ];
        return $this->performGetMutationsRequest($params);
    }

    public function getMutationsByMutationsInRange($startMutationId, $endMutationId)
    {
        $params = [
            "SecurityCode2" => $this->securityCode2,
            "SessionID" => $this->sessionId,
            "cFilter" => [
                "MutatieNr" => 0,
                "MutatieNrVan" => $startMutationId,
                "MutatieNrTm" => $endMutationId,
                "Factuurnummer" => "",
                "DatumVan" => "1980-01-01",
                "DatumTm" => "2049-12-31"
            ]
        ];
        return $this->performGetMutationsRequest($params);
    }

    public function getMutationsByMutationsByInvoiceNumber($invoiceNr)
    {
        $invoiceNr = new InvoiceNumber($invoiceNr);

        $params = [
            "SecurityCode2" => $this->securityCode2,
            "SessionID" => $this->sessionId,
            "cFilter" => [
                "MutatieNr" => 0,
                "MutatieNrVan" => "",
                "MutatieNrTm" => "",
                "Factuurnummer" => $invoiceNr->__toString(),
                "DatumVan" => "1980-01-01",
                "DatumTm" => "2049-12-31"
            ]
        ];
        return $this->performGetMutationsRequest($params);
    }

    private function performGetMutationsRequest($params)
    {
        try {
            $response = $this->soapClient->__soapCall("GetMutaties", [$params]);

            $this->checkforerror($response, "GetMutatiesResult");
            return $response->GetMutatiesResult;
        } catch(\SoapFault $soapFault) {
            throw new \Exception('<strong>Soap Exception:</strong> ' . $soapFault);
        }
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