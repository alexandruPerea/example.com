<?php

include 'UIHelper.php';
include 'AXCustCustomerWrapper.php';

$customerInfo = unserialize(base64_decode($_POST['customerInfo']));
$account = $_POST['account'];

$contactName = $_POST['ContactName'];
$roles = $_POST['Roles'];
$type = $_POST['Type'];
$locator = $_POST['Locator'];
$isPrimary = $_POST['IsPrimary'];
$isPrimaryYesNo = $isPrimary;
$contactRecId = $_POST['ContactRecId'];

$custHandler = new AXCustCustomerHandler();

$customer = null;
if($customerInfo->DirParty->OrganizationName)
  //$partyType = 'AxdEntity_DirParty_DirOrganization';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,false);
if($customerInfo->DirParty->PersonName)
  //$partyType = 'AxdEntity_DirParty_DirPerson';
  $customer = AXCustomer::constructForUpdate($customerInfo,$account,true);

$customer->setContactDetails($isPrimaryYesNo,$contactName,$locator,$type);
$customerDetails = $customer->getContactUpdateSoap($contactRecId,$roles);

/*$validAsOfDate = date('Y-m-d\TH:i:s\Z');
//echo $validAsOfDate;

$contactUpdateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
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
                <DirPartyContactInfoView class="entity" action="update">
                  <IsPrimary>'.$isPrimaryYesNo.'</IsPrimary>
                  <LocationName>'.$contactName.'</LocationName>
                  <Locator>'.$locator.'</Locator>
                  <RecId>'.$contactRecId.'</RecId>
                  <Roles>'.$roles.'</Roles>
                  <Type>'.$type.'</Type>
                </DirPartyContactInfoView>
              </DirParty>
            </CustTable>
          </Customer>
        </CustomerServiceUpdateRequest>';

    //echo htmlspecialchars($addressUpdateXML);

$customerDetails = new SoapVar($contactUpdateXML,XSD_ANYXML);*/
try{
  $custHandler->update($customerDetails);
}catch(Exception $e){
  echo $e->getMEssage();
}

rediretToCustomerDetails($account);

 ?>
