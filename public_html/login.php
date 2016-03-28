<?php
include 'DBOperationsHandler.php';
include 'UIHelper.php';

$email = $_POST['email'];
$password = $_POST['password'];
$md5password = md5($password);
$dbHandler = new DBOperationsHandler();

$retValue = $dbHandler->findUserByEmail($email);
if($retValue != null){
  $row = mysql_fetch_assoc($retValue);
  $dbPassword = $row['md5password'];
  try{
    if($dbPassword === $md5password){
        $axId = $row['axid'];
        displayCustomerDetails($axId);
    }
  } catch (Exception $e){
    echo $e->getMEssage();
  }

}
else {
  echo '!Inliad log in credentials.';
}
?>
