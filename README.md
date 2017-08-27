# PHP Wrapper for eBoekhouden SOAP server

This package makes it easy to connect to your eBoekhouden Accounting system.

Login to your account on eBoekhouden and go to Beheer -> Instellingen -> API/SOAP.
 
Call the eBoekhoudenConnect class as follow:

```$eBoekhouden = new eBoekhoudenConnect("Username", "SecurityCode1", "SecurityCode2");```

After that you can use the class as described below:

```$eBoekhouden->getInvoices($dateFrom, $toDate, $invoiceNumber, $relationCode)```

| Field | Format | Mandatory |
| --- | --- | :---: |
| $dateFormat | yyyy-mm-dd | Y |
| $toDate | yyyy-mm-dd | Y |
| $invoiceNumber | STRING 50 | N |
| $relationCode | STRING 15 | N |

## Exception codes
100: Date is a required value \
101: DateFormat incorrect for value: [DATE] \
102: Year must be greater or equal to 1980 \
103: Year must be less or equal to 2049 \
104: Invoice number may have a string length of maximal 50 characters \
105: Relation code may have a string length of maximal 15 characters \
106: Account Ledger Id must be integer or null \
107: Account Ledger Code may not exceed the length of 10 characters or may be null \
108: Account Ledger Category may not exceed the length of 10 characters or may be null \
109: Mutation Id must be integer or null \
110: Relation Id must be integer \
111: Relation search query may not exceed the length of 255 characters \
112: