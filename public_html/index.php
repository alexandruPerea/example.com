
<?php
include 'AXCustCustomerHandler.php';

$customerHanlder = new AXCustCustomerHandler();
//$customerHanlder->read('000003');

$customers = $customerHanlder->findKeys();

echo '<form method="POST" action="getCustomerDetails.php">
<select name="per1" id="per1">
  <option selected="selected">Choose one</option>';

  foreach($customers as $customerId) {
      echo '<option value="'.$customerId.'">'.$customerId.'</option>';
    }


echo '</select>
  <input type="submit" value="Submit">
</form>';
echo '<a href="./register.html">New account</a>';
echo '<br><a href="./login.html">Login</a>';

?>
