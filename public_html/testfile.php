<?php

include 'AXCustCustomerWrapper.php';

$customerInfo = "abc";
$account = 'us-003';
$type = "Person";

$person = AXCustomer::constructForUpdate($customerInfo,$account,$type);
$person->setAddressDetails('123','234','54','dgh','sdfg','sdfg','sdg');

var_dump($person->getAddressCreateSoapVar());



//include 'AXCustCustomerHandler.php';
//include 'AXCustCustomerWrapper.php';
//include 'DBOperationsHandler.php';
//include 'UIHelper.php';

//displayCustomerDetails('000103');

//$customerHanlder = new AXCustCustomerHandler();
//$custTable = $customerHanlder->read('000003');
/*$dirParty = Array('DirParty'=>
              Array('_'=>'','class'=>'entity','LanguageId'=>'en-us','Name'=>'Test cutomer PHP','DirPartyPostalAdressView'=>
                Array('_'=>'','class'=>'entity','City'=>'Seatlle','CountryRegionId'=>'USA','HSOAddressValidated'=>'Yes','LocationName'=>'Test location PHP','Roles'=>'Business','State'=>'WA','Street'=>'123 Main Street','ZipCode'=>'98101'),'OrganizationName'=>
                  Array('_'=>'','class'=>'entity','Name'=>'Test customer PHP')));

$SoapVar = new SoapVar($dirParty,SOAP_ENC_OBJECT,'DirParty');
$customerDetails = Array('Customer'=>
                      Array('CustTable'=>
                        Array('_'=>'','class'=>'entity','CustGroup'=>30,$dirParty)));*/
//$customerDetails = new ArrayObject();

//$custTable = Array('CustTable'=>Array('CustGroup'=>30));
//$custGroup = new SoapVar('30',XSD_STRING,null,null,'CustGroup');
//$customerCreateXML = '
/*<CustomerServiceCreateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
  <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
   <CustTable class="entity">
    <CustGroup>30</CustGroup>
    <DirParty class="entity" xsi:type="AxdEntity_DirParty_DirOrganization"  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
      <LanguageId>en-us</LanguageId>
      <Name>Test customer PHP</Name>
      <DirPartyPostalAddressView class="entity">
        <City>Seattle</City>
        <CountryRegionId>USA</CountryRegionId>
        <HSOAddressValidated>Yes</HSOAddressValidated>
        <LocationName>Test customer address</LocationName>
        <Roles>Business</Roles>
        <State>WA</State>
        <Street>123 Main Street</Street>
        <ZipCode>98101</ZipCode>
      </DirPartyPostalAddressView>
      <OrganizationName class="entity">
        <Name>Test customer PHP</Name>
      </OrganizationName>
    </DirParty>
   </CustTable>
  </Customer>
</CustomerServiceCreateRequest>';
*/
//$customerDetails = new SoapVar($customerCreateXML,XSD_ANYXML);

/*
$custGroup['CustGroup'] = 30;
$custTable = new SoapVar($custGroup,SOAP_ENC_OBJECT,null,null,'CustTable');
$customer = new SoapVar($custTable,SOAP_ENC_OBJECT,null,null,'Customer');
var_dump($customer);
$customerDetails = new SoapVar($customer,SOAP_ENC_OBJECT);
*/
//$axCustomer = new AXPerson('firstName','middleName','lastName','30');
//$custCreateResponse = $customerHanlder->create($axCustomer->getCreateSoapVar());

//$dbHandler = new DBOperationsHandler();
//$username_,$email_,$axid_,$reg_date_,$md5password_){
//$dbHandler->insertCustomerDetails('alex123','test@test.com','00090',date('Y-m-d H:i:s'),md5('123abc'));
//phpinfo();
/*$expected  = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$correct   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$incorrect = crypt('apple',  '$2a$07$usesomesillystringforsalt$');

var_dump(hash_equals($expected, $correct));
var_dump(hash_equals($expected, $incorrect));*/

 ?>
