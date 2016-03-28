<?php

include 'UIHelper.php';
include 'AXCustCustomerWrapper.php';

$locationName = $_POST['LocationName'];
$roles = $_POST['Roles'];
$countryRegionId = $_POST['CountryRegionId'];
$zipCode = $_POST['ZipCode'];
$street = $_POST['Street'];
$city = $_POST['City'];
$state = $_POST['State'];
$county = $_POST['County'];
$isPrimary = $_POST['IsPrimary'];
$isPrimaryYesNo = $isPrimary;
$addressRecId = $_POST['AddressRecId'];
$customerInfo = unserialize(base64_decode($_POST['customerInfo']));
$account = $_POST['account'];

  /*  LocationName
    Roles
    CountryRegionId
    ZipCode
    Street
    City
    State
    County
    IsPrimary
    AddressRecId
*/

$custHandler = new AXCustCustomerHandler();

$customer = null;
if($customerInfo->DirParty->OrganizationName)
  //$partyType = 'AxdEntity_DirParty_DirOrganization';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,false);
if($customerInfo->DirParty->PersonName)
  //$partyType = 'AxdEntity_DirParty_DirPerson';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,true);

$customer->setAddressDetails($city,$countryRegionId,$isPrimaryYesNo,$locationName,$state,$street,$zipCode);
$customerDetails = $customer->getAddressUpdateSoap($addressRecId,$roles);

/*$validAsOfDate = date('Y-m-d\TH:i:s\Z');
//echo $validAsOfDate;

$addressUpdateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
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
                <DirPartyPostalAddressView class="entity" updateMode="CreateNewTimePeriod" action="update">
                  <!--<_RecId_LogisticsPostalAddress>'.$addressRecId.'</_RecId_LogisticsPostalAddress>-->
                  <City>'.$city.'</City>
                  <CountryRegionId>'.$countryRegionId.'</CountryRegionId>
                  <IsPrimary>'.$isPrimaryYesNo.'</IsPrimary>
                  <LocationName>'.$locationName.'</LocationName>
                  <RecId>'.$addressRecId.'</RecId>
                  <Roles>'.$roles.'</Roles>
                  <State>'.$state.'</State>
                  <Street>'.$street.'</Street>
                  <ZipCode>'.$zipCode.'</ZipCode>
                </DirPartyPostalAddressView>
              </DirParty>
            </CustTable>
          </Customer>
        </CustomerServiceUpdateRequest>';

    //echo htmlspecialchars($addressUpdateXML);

$customerDetails = new SoapVar($addressUpdateXML,XSD_ANYXML);*/
try{
  $custHandler->update($customerDetails);
}catch(Exception $e){
  echo $e->getMEssage();
}

rediretToCustomerDetails($account);
 ?>
