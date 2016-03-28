<?php

class AXCustomer{
  protected $custGroup;
  protected $email;

  //details about customer info and number
  protected $customerInfo;
  protected $account;

  //contact details
  protected $contactIsPrimaryYesNo;
  protected $contactName;
  protected $locator;
  protected $contactType;

  //address details
  protected $city;
  protected $countryRegionId;
  protected $isPrimaryYesNo;
  protected $locationName;
  protected $state;
  protected $street;
  protected $zipCode;

  /**
   * Get the value of Contact Is Primary Yes No
   *
   * @return mixed
   */
  public function getContactIsPrimaryYesNo()
  {
      return $this->contactIsPrimaryYesNo;
  }

  /**
   * Set the value of Contact Is Primary Yes No
   *
   * @param mixed contactIsPrimaryYesNo
   *
   * @return self
   */
  public function setContactIsPrimaryYesNo($contactIsPrimaryYesNo)
  {
      $this->contactIsPrimaryYesNo = $contactIsPrimaryYesNo;

      return $this;
  }

  /**
   * Get the value of Contact Name
   *
   * @return mixed
   */
  public function getContactName()
  {
      return $this->contactName;
  }

  /**
   * Set the value of Contact Name
   *
   * @param mixed contactName
   *
   * @return self
   */
  public function setContactName($contactName)
  {
      $this->contactName = $contactName;

      return $this;
  }

  /**
   * Get the value of Locator
   *
   * @return mixed
   */
  public function getLocator()
  {
      return $this->locator;
  }

  /**
   * Set the value of Locator
   *
   * @param mixed locator
   *
   * @return self
   */
  public function setLocator($locator)
  {
      $this->locator = $locator;

      return $this;
  }

  /**
   * Get the value of Contact Type
   *
   * @return mixed
   */
  public function getContactType()
  {
      return $this->contactType;
  }

  /**
   * Set the value of Contact Type
   *
   * @param mixed contactType
   *
   * @return self
   */
  public function setContactType($contactType)
  {
      $this->contactType = $contactType;

      return $this;
  }

  /**
   * Get the value of Cust Group
   *
   * @return mixed
   */
  public function getCustGroup()
  {
      return $this->custGroup;
  }

  /**
   * Set the value of Cust Group
   *
   * @param mixed custGroup
   *
   * @return self
   */
  public function setCustGroup($custGroup)
  {
      $this->custGroup = $custGroup;

      return $this;
  }

  /**
   * Get the value of Email
   *
   * @return mixed
   */
  public function getEmail()
  {
      return $this->email;
  }

  /**
   * Set the value of Email
   *
   * @param mixed email
   *
   * @return self
   */
  public function setEmail($email)
  {
      $this->email = $email;

      return $this;
  }

  /**
   * Get the value of Customer Info
   *
   * @return mixed
   */
  public function getCustomerInfo()
  {
      return $this->customerInfo;
  }

  /**
   * Set the value of Customer Info
   *
   * @param mixed customerInfo
   *
   * @return self
   */
  public function setCustomerInfo($customerInfo)
  {
      $this->customerInfo = $customerInfo;

      return $this;
  }

  /**
   * Get the value of Account
   *
   * @return mixed
   */
  public function getAccount()
  {
      return $this->account;
  }

  /**
   * Set the value of Account
   *
   * @param mixed account
   *
   * @return self
   */
  public function setAccount($account)
  {
      $this->account = $account;

      return $this;
  }

  /**
   * Get the value of City
   *
   * @return mixed
   */
  public function getCity()
  {
      return $this->city;
  }

  /**
   * Set the value of City
   *
   * @param mixed city
   *
   * @return self
   */
  public function setCity($city)
  {
      $this->city = $city;

      return $this;
  }

  /**
   * Get the value of Country Region Id
   *
   * @return mixed
   */
  public function getCountryRegionId()
  {
      return $this->countryRegionId;
  }

  /**
   * Set the value of Country Region Id
   *
   * @param mixed countryRegionId
   *
   * @return self
   */
  public function setCountryRegionId($countryRegionId)
  {
      $this->countryRegionId = $countryRegionId;

      return $this;
  }

  /**
   * Get the value of Is Primary Yes No
   *
   * @return mixed
   */
  public function getIsPrimaryYesNo()
  {
      return $this->isPrimaryYesNo;
  }

  /**
   * Set the value of Is Primary Yes No
   *
   * @param mixed isPrimaryYesNo
   *
   * @return self
   */
  public function setIsPrimaryYesNo($isPrimaryYesNo)
  {
      $this->isPrimaryYesNo = $isPrimaryYesNo;

      return $this;
  }

  /**
   * Get the value of Location Name
   *
   * @return mixed
   */
  public function getLocationName()
  {
      return $this->locationName;
  }

  /**
   * Set the value of Location Name
   *
   * @param mixed locationName
   *
   * @return self
   */
  public function setLocationName($locationName)
  {
      $this->locationName = $locationName;

      return $this;
  }

  /**
   * Get the value of State
   *
   * @return mixed
   */
  public function getState()
  {
      return $this->state;
  }

  /**
   * Set the value of State
   *
   * @param mixed state
   *
   * @return self
   */
  public function setState($state)
  {
      $this->state = $state;

      return $this;
  }

  /**
   * Get the value of Street
   *
   * @return mixed
   */
  public function getStreet()
  {
      return $this->street;
  }

  /**
   * Set the value of Street
   *
   * @param mixed street
   *
   * @return self
   */
  public function setStreet($street)
  {
      $this->street = $street;

      return $this;
  }

  /**
   * Get the value of Zip Code
   *
   * @return mixed
   */
  public function getZipCode()
  {
      return $this->zipCode;
  }

  /**
   * Set the value of Zip Code
   *
   * @param mixed zipCode
   *
   * @return self
   */
  public function setZipCode($zipCode)
  {
      $this->zipCode = $zipCode;

      return $this;
  }

  public function __construct(){

  }

  static function constructForUpdate($customerInfo_,$account_,$isPerson_){
    $customer = null;
    if($isPerson_){
      $customer = new AXPerson();
    } else {
      $customer = new AXOrganization();
    }

    $customer->setCustomerInfo($customerInfo_);
    $customer->setAccount($account_);

    return $customer;
  }

  function generateUserName(){

  }
  function getCustomerType(){

  }
  function generateNameNode(){

  }
  function generateName(){
    return '';
  }

  function setAddressDetails($city_, $countryRegionId_, $isPrimaryYesNo_, $locationName_, $state_, $street_, $zipCode_){
     $this->city = $city_;
     $this->countryRegionId = $countryRegionId_;
     $this->isPrimaryYesNo = $isPrimaryYesNo_;
     $this->locationName = $locationName_;
     $this->state = $state_;
     $this->street = $street_;
     $this->zipCode = $zipCode_;
  }

  function setContactDetails($contactIsPrimaryYesNo_,$contactName_,$locator_,$contactType_){
    $this->contactIsPrimaryYesNo = $contactIsPrimaryYesNo_;
    $this->contactName = $contactName_;
    $this->locator = $locator_;
    $this->contactType = $contactType_;
  }

  function getCreateSoapVar(){
    $customerCreateXML = '
    <CustomerServiceCreateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
      <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
       <CustTable class="entity">
        <CustGroup>'.$this->custGroup.'</CustGroup>
        <DirParty class="entity" xsi:type="'.$this->getCustomerType().'"  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
          <LanguageId>en-us</LanguageId>
          '.$this->getNameXML().'
          <DirPartyContactInfoView class="entity">
            <IsPrimary>Yes</IsPrimary>
            <LocationName>Primary email</LocationName>
            <Locator>'.$this->email.'</Locator>
            <Roles>Business</Roles>
            <Type>Email</Type>
          </DirPartyContactInfoView>
          '.$this->getNameNode().'
        </DirParty>
       </CustTable>
      </Customer>
    </CustomerServiceCreateRequest>';

    $customerDetails = new SoapVar($customerCreateXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getAddressCreateSoapVar(){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');

    $addressCreateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyPostalAddressView action="create" class="entity">
                      <City>'.$this->city.'</City>
                      <CountryRegionId>'.$this->countryRegionId.'</CountryRegionId>
                      <IsPrimary>'.$this->isPrimaryYesNo.'</IsPrimary>
                      <LocationName>'.$this->locationName.'</LocationName>
                      <Roles>Business</Roles>
                      <State>'.$this->state.'</State>
                      <Street>'.$this->street.'</Street>
                      <ZipCode>'.$this->zipCode.'</ZipCode>
                    </DirPartyPostalAddressView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

    $customerDetails = new SoapVar($addressCreateXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getContactCreateSoapVar(){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');

    $contactCreateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyContactInfoView action="create" class="entity">
                      <IsPrimary>'.$this->contactIsPrimaryYesNo.'</IsPrimary>
                      <LocationName>'.$this->contactName.'</LocationName>
                      <Locator>'.$this->locator.'</Locator>
                      <Roles>Business</Roles>
                      <Type>'.$this->contactType.'</Type>
                    </DirPartyContactInfoView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

    $customerDetails = new SoapVar($contactCreateXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getAddressDeleteSoap($addressRecId_){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');
    //echo $validAsOfDate;

    $addressDeleteXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyPostalAddressView class="entity" action="delete">
                      <RecId>'.$addressRecId_.'</RecId>
                    </DirPartyPostalAddressView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

        //echo htmlspecialchars($addressUpdateXML);

    $customerDetails = new SoapVar($addressDeleteXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getContactDeleteSoap($contactRecId_){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');
    //echo $validAsOfDate;

    $contactDeleteXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyContactInfoView class="entity" action="delete">
                      <ElectronicAddress>'.$contactRecId_.'</ElectronicAddress>
                      <RecId>'.$contactRecId_.'</RecId>
                    </DirPartyContactInfoView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

        //echo htmlspecialchars($addressUpdateXML);

    $customerDetails = new SoapVar($contactDeleteXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getAddressUpdateSoap($addressRecId_,$roles_){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');
    //echo $validAsOfDate;

    $addressUpdateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyPostalAddressView class="entity" updateMode="CreateNewTimePeriod" action="update">
                      <!--<_RecId_LogisticsPostalAddress>'.$addressRecId_.'</_RecId_LogisticsPostalAddress>-->
                      <City>'.$this->city.'</City>
                      <CountryRegionId>'.$this->countryRegionId.'</CountryRegionId>
                      <IsPrimary>'.$this->isPrimaryYesNo.'</IsPrimary>
                      <LocationName>'.$this->locationName.'</LocationName>
                      <RecId>'.$addressRecId_.'</RecId>
                      <Roles>'.$roles_.'</Roles>
                      <State>'.$this->state.'</State>
                      <Street>'.$this->street.'</Street>
                      <ZipCode>'.$this->zipCode.'</ZipCode>
                    </DirPartyPostalAddressView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

        //echo htmlspecialchars($addressUpdateXML);

    $customerDetails = new SoapVar($addressUpdateXML,XSD_ANYXML);

    return $customerDetails;
  }

  function getContactUpdateSoap($contactRecId_,$roles_){
    $validAsOfDate = date('Y-m-d\TH:i:s\Z');
    //echo $validAsOfDate;

    $contactUpdateXML = '<CustomerServiceUpdateRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
              <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
                <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
                  <KeyData>
                    <KeyField>
                      <Field>AccountNum</Field>
                      <Value>'.$this->account.'</Value>
                    </KeyField>
                  </KeyData>
                </EntityKey>
              </EntityKeyList>
              <Customer xmlns="http://schemas.microsoft.com/dynamics/2008/01/documents/Customer">
                <ValidAsOfDateTime>'.$validAsOfDate .'</ValidAsOfDateTime>
                <ValidTimeStateType>AsOf</ValidTimeStateType>
                <CustTable class="entity" action="update">
                  <_DocumentHash>'.$this->customerInfo->_DocumentHash.'</_DocumentHash>
                  <AccountNum>'.$this->account.'</AccountNum>
                  <CustGroup>'.$this->customerInfo->CustGroup.'</CustGroup>
                  <DirParty xsi:type="'.$this->getCustomerType().'" action="update" class="entity" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <RecId>'.$this->customerInfo->DirParty->RecId.'</RecId>
                    <DirPartyContactInfoView class="entity" action="update">
                      <IsPrimary>'.$this->contactIsPrimaryYesNo.'</IsPrimary>
                      <LocationName>'.$this->contactName.'</LocationName>
                      <Locator>'.$this->locator.'</Locator>
                      <RecId>'.$contactRecId_.'</RecId>
                      <Roles>'.$roles_.'</Roles>
                      <Type>'.$this->contactType.'</Type>
                    </DirPartyContactInfoView>
                  </DirParty>
                </CustTable>
              </Customer>
            </CustomerServiceUpdateRequest>';

        //echo htmlspecialchars($addressUpdateXML);

    $customerDetails = new SoapVar($contactUpdateXML,XSD_ANYXML);

    return $customerDetails;
  }
}

class AXPerson extends AXCustomer{
  protected $firstName;
  protected $middleName;
  protected $lastName;

  /**
   * Get the value of First Name
   *
   * @return mixed
   */
  public function getFirstName()
  {
      return $this->firstName;
  }

  /**
   * Set the value of First Name
   *
   * @param mixed firstName
   *
   * @return self
   */
  public function setFirstName($firstName)
  {
      $this->firstName = $firstName;

      return $this;
  }

  /**
   * Get the value of Middle Name
   *
   * @return mixed
   */
  public function getMiddleName()
  {
      return $this->middleName;
  }

  /**
   * Set the value of Middle Name
   *
   * @param mixed middleName
   *
   * @return self
   */
  public function setMiddleName($middleName)
  {
      $this->middleName = $middleName;

      return $this;
  }

  /**
   * Get the value of Last Name
   *
   * @return mixed
   */
  public function getLastName()
  {
      return $this->lastName;
  }

  /**
   * Set the value of Last Name
   *
   * @param mixed lastName
   *
   * @return self
   */
  public function setLastName($lastName)
  {
      $this->lastName = $lastName;

      return $this;
  }

  public static function constructFromDetails($firstName_,$middleName_,$lastName_,$custGroup_,$email_){
    $person = new AXPerson();
    $person->setFirstName($firstName_);
    $person->setMiddleName($middleName_);
    $person->setLastName($lastName_);
    $person->setCustGroup($custGroup_);
    $person->setEmail($email_);
  }

  function generateUserName(){
    return $this->firstName.'_'.$this->middleName.'_'.$this->lastName;
  }

  function getCustomerType(){
    return 'AxdEntity_DirParty_DirPerson';
  }
  function generateNameNode(){
    return '<PersonName class="entity">
      <FirstName>'.$this->firstName.'</FirstName>
      <LastName>'.$this->middleName.'</LastName>
      <MiddleName>'.$this->lastName.'</MiddleName>
    </PersonName>';
  }
}

class AXOrganization extends AXCustomer{
  protected $name;

  /**
   * Get the value of Name
   *
   * @return mixed
   */
  public function getName()
  {
      return $this->name;
  }

  /**
   * Set the value of Name
   *
   * @param mixed name
   *
   * @return self
   */
  public function setName($name)
  {
      $this->name = $name;

      return $this;
  }

  public static function constructFromDetails($name_,$custGroup_,$email_){
    $organization = new AXOrganization();
    $organization->setName($name_);
    $organization->setCustGroup($custGroup_);
    $organization->setEmail($email_);
  }

  function generateUserName(){
    return $this->name;
  }

  function getCustomerType(){
    return 'AxdEntity_DirParty_DirOrganization';
  }
  function generateNameNode(){
    return '<OrganizationName class="entity">
      <Name>'.$this->name.'</Name>
    </OrganizationName>';
  }
  function generateName(){
    return '<Name>'.$this->name.'</Name>';
  }



}
?>
