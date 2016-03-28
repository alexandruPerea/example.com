<?php
include 'UIHelper.php';
include 'AXCustCustomerWrapper.php';

$customerHandler = new AXCustCustomerHandler();

$account = $_POST['account'];
$customerInfo = unserialize(base64_decode($_POST['customerInfo']));

$locator = $_POST['Locator'];
$contactName = $_POST['ContactName'];
$contactType = $_POST['ContactType'];
$isPrimary = $_POST['IsPrimary'];
$isPrimaryYesNo = 'No';
if($isPrimary == 'on')
  $isPrimaryYesNo = 'Yes';

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

$partyType = '';
if($customerInfo->DirParty->OrganizationName)
  //$partyType = 'AxdEntity_DirParty_DirOrganization';
  $customer = AXOrganization::constructForUpdate($customerInfo,$account,'Organization');
if($customerInfo->DirParty->PersonName)
  $customer = AXOrganization::constructForUpdate($customerInfo,$account,'Person');
$customer->setContactDetails($isPrimaryYesNo,$contactName,$locator,$contactType);
/*$validAsOfDate = date('Y-m-d\TH:i:s\Z');

$contactCreateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
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
                <DirPartyContactInfoView action="create" class="entity">
                  <IsPrimary>'.$isPrimaryYesNo.'</IsPrimary>
                  <LocationName>'.$contactName.'</LocationName>
                  <Locator>'.$locator.'</Locator>
                  <Roles>Business</Roles>
                  <Type>'.$contactType.'</Type>
                </DirPartyContactInfoView>
              </DirParty>
            </CustTable>
          </Customer>
        </CustomerServiceUpdateRequest>';

$customerDetails = new SoapVar($contactCreateXML,XSD_ANYXML);*/

$customerDetails = $customer->getContactCreateSoapVar();

try{
  $customerHandler->update($customerDetails);
}catch(Exception $e){
  echo $e->getMEssage();
}

rediretToCustomerDetails($account);
 ?>
