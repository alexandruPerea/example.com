<?php
include 'AXCustCustomerWrapper.php';
include 'AXCustCustomerHandler.php';
include 'DBOperationsHandler.php';

$customerHanlder = new AXCustCustomerHandler();

$custType = $_POST['custType'];

$email = $_POST['email'];
$password = $_POST['password'];
$md5password = md5($password);
//echo $md5password;
$axCustomer;
$username;

if($custType == 'Person'){
  $firstName = $_POST['firstname'];
  $middleName = $_POST['middlename'];
  $lastName = $_POST['lastname'];

  $axCustomer = AXPerson::constructFromDetails($firstName,$middleName,$lastName,'30',$email);

}
else if($custType == 'Organization'){
  $companyName = $_POST['companyname'];

  $axCustomer = AXOrganization::constructFromDetails($companyName,'30',$email);
}

$dbOperationsHandler = new DBOperationsHandler();
if($dbOperationsHandler->checkEmailIsAlreadyUsed($email))
  die('Email has already been used. <a href="">Reset passwrod.<a>');

$custCreateResponse = $customerHanlder->create($axCustomer->getCreateSoapVar());
$axCustomerAccount = $custCreateResponse->EntityKeyList->EntityKey->KeyData->KeyField->Value;

$reg_date = date('Y-m-d H:i:s');

$dbOperationsHandler->insertCustomerDetails($axCustomer->generateUserName(),$email,$axCustomerAccount,$reg_date,$md5password);


?>
