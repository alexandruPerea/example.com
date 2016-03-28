<?php
//include 'AXCustCustomerHandler.php';
include 'UIHelper.php';
include 'AXCustCustomerWrapper.php';

$customerHandler = new AXCustCustomerHandler();

$account = $_POST['account'];
$customerInfo = unserialize(base64_decode($_POST['customerInfo']));

//var_dump($customerInfo);

$locationName = $_POST['LocationName'];
$countryRegionId = $_POST['CountryRegionId'];
$zipCode = $_POST['ZipCode'];
$street = $_POST['Street'];
$city = $_POST['City'];
$state = $_POST['State'];
$isPrimary = $_POST['IsPrimary'];
$isPrimaryYesNo = 'No';
if($isPriamry == 'on')
  $isPrimaryYesNo = 'Yes';

$customer = null;
if($customerInfo->DirParty->OrganizationName)
  //$partyType = 'AxdEntity_DirParty_DirOrganization';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,false);
if($customerInfo->DirParty->PersonName)
  //$partyType = 'AxdEntity_DirParty_DirPerson';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,true);

$customer->setAddressDetails($city,$countryRegionId,$isPrimaryYesNo,$locationName,$state,$street,$zipCode);
/*
$validAsOfDate = date('Y-m-d\TH:i:s\Z');
//echo $validAsOfDate;

$addressCreateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
          <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
            <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
              <KeyData>
                <KeyField>
                  <Field>AccountNum</Field>
                  <Value>'.$account.'</Value>
                </KeyField>
              </KeyData>
            </EntityKey>
          </EntityKeyList>
          <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
            <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
            <ValidTimeStateType>AsOf</ValidTimeStateType>
            <CustTable class="entity" action="update">
              <_DocumentHash>'.$customerInfo->_DocumentHash.'</_DocumentHash>
              <AccountNum>'.$account.'</AccountNum>
              <CustGroup>'.$customerInfo->CustGroup.'</CustGroup>
              <DirParty xsi:type="'.$partyType.'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <RecId>'.$customerInfo->DirParty->RecId.'</RecId>
                <DirPartyPostalAddressView action="create" class="entity">
                  <City>'.$city.'</City>
                  <CountryRegionId>'.$countryRegionId.'</CountryRegionId>
                  <IsPrimary>'.$isPrimaryYesNo.'</IsPrimary>
                  <LocationName>'.$locationName.'</LocationName>
                  <Roles>Business</Roles>
                  <State>'.$state.'</State>
                  <Street>'.$street.'</Street>
                  <ZipCode>'.$zipCode.'</ZipCode>
                </DirPartyPostalAddressView>
              </DirParty>
            </CustTable>
          </Customer>
        </CustomerServiceUpdateRequest>';

$customerDetails = new SoapVar($addressCreateXML,XSD_ANYXML);*/

$customerDetails = $customer->getAddressCreateSoapVar();
try{
  $customerHandler->update($customerDetails);
}catch(Exception $e){
  echo $e->getMEssage();
}

rediretToCustomerDetails($account);

?>
