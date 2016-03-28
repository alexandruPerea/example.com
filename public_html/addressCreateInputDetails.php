<?php

$account = $_POST['account'];
$customerInfo = $_POST['customerInfo'];

echo '<form action="addressCreate.php" method="POST">
  <input type="hidden" name="account" value ="'.$account.'">
  <input type="hidden" name="customerInfo" value="'.$customerInfo.'">
  Location name:<input type="text" name="LocationName">
  <br>Country/region:<input type="text" name="CountryRegionId">
  <br>Zip/postal code:<input type="text" name="ZipCode">
  <br>Street:<input type="text" name="Street">
  <br>City:<input type="text" name="City">
  <br>State:<input type="text" name="State">
  <br>Primary:<input type="checkbox" name="IsPrimary">
  <br><input type="submit" value="Create new address">
</form>';

?>
