<?php

$account = $_POST['account'];
$customerInfo = $_POST['customerInfo'];

echo '<form action="contactCreate.php" method="POST">
  <input type="hidden" name="account" value ="'.$account.'">
  <input type="hidden" name="customerInfo" value="'.$customerInfo.'">
  Contact name:<input type="text" name="ContactName">
  <br>Contact type:<select name="ContactType" id="ContactType">
    <option value="Email">Email</option>
    <option value="Phone">Phone</option>
  </select>
  <br>Contact number/address:<input type="text" name="Locator">
  <br>Primary:<input type="checkbox" name="IsPrimary">
  <br><input type="submit" value="Create new contact">
</form>';

 ?>
