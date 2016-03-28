<?php

include 'AXCustCustomerHandler.php';

echo '<script type="text/javascript" src="editCustomer.js"></script>';

function displayAddressDetails($address_,$customerInfo_,$custAccount_){
  echo '<td>';
    echo '<form action="addressUpdate.php" method="POST">
            <input type="hidden" name="customerInfo" value="'.base64_encode(serialize($customerInfo_)).'">
            <input type="hidden" name="account" value="'.$custAccount_.'">';
      echo '<div>Location name:<input id="LocationName" name="LocationName" value ="'.$address_->LocationName.'"readonly="readonly"></div>';
      echo '<div>Purpose:<input id="Roles" name="Roles" value ="'.$address_->Roles.'"readonly="readonly"></div>';
      echo '<div>Country/region:<input id="CountryRegionId" name="CountryRegionId" value ="'.$address_->CountryRegionId.'"readonly="readonly"></div>';
      echo '<div>Zip/postal code:<input id="ZipCode" name="ZipCode" value ="'.$address_->ZipCode.'"readonly="readonly"></div>';
      echo '<div>Street:<input id="Street" name="Street" value ="'.$address_->Street.'"readonly="readonly"></div>';
      echo '<div>City:<input id="City" name="City" value ="'.$address_->City.'"readonly="readonly"></div>';
      echo '<div>State:<input id="State" name="State" value ="'.$address_->State.'"readonly="readonly"></div>';
      echo '<div>County:<input id="County" name="County" value ="'.$address_->County.'"readonly="readonly"></div>';
      echo '<div>Primary:<input id="IsPrimary" name="IsPrimary" value ="'.$address_->IsPrimary.'"readonly="readonly"></div>';
      echo '<input type="hidden" id="AddressRecId" name="AddressRecId" value ="'.$address_->RecId.'">';
      echo '<input type="submit" value="Update" disabled="disabled">
      <button type="button" name="editButton" onclick="enableFields(this)">Edit</button>
      <button type="button" name="cancelButton" hidden=true onclick="cancelEdit(this)">Cancel</button>
      <button type="button" name="deleteButton" onclick="deleteAddress(this)">Delete</button>';
    echo '</form>';
  echo '</td>';
}
function displayContactInformationDetails($contact_,$customerInfo_,$custAccount_){
  echo '<td>';
  echo '<form action="contactUpdate.php" method="POST">
          <input type="hidden" name="customerInfo" value="'.base64_encode(serialize($customerInfo_)).'">
          <input type="hidden" name="account" value="'.$custAccount_.'">';
  echo '<div>Desctipion:<input id="ContactName" name="ContactName" value ="'.$contact_->LocationName.'"readonly="readonly"></div>';
  echo '<div>Roles:<input id="Roles" name="Roles" value ="'.$contact_->Roles.'"readonly="readonly"></div>';
  echo '<div>Type:<input id="Type" name="Type" value ="'.$contact_->Type.'"readonly="readonly"></div>';
  echo '<div>'.$contact_->Type.':<input id="Locator" name="Locator" value ="'.$contact_->Locator.'"readonly="readonly"></div>';
  echo '<div>Primary:<input id="IsPrimary" name="IsPrimary" value ="'.$contact_->IsPrimary.'"readonly="readonly"></div>';
  echo '<input type="hidden" id="ContactRecId" name="ContactRecId" value ="'.$contact_->RecId.'">';
  echo '<input type="submit" value="Update" disabled>
  <button type="button" name="editButton" onclick="enableFields(this)">Edit</button>
  <button type="button" name="cancelButton" hidden=true onclick="cancelEdit(this)">Cancel</button>
  <button type="button" name="deleteButton" onclick="deleteContact(this)">Delete</button>';
  echo '</form>';
  echo '</td>';
}

function displayCustomerDetails($custAccount_){

  $customerHanlder = new AXCustCustomerHandler();

  $customerInfo = $customerHanlder->read($custAccount_);

  echo '<table border="1" style="width:400px">
  <tr>
    <td>Name</td>
    <td>Account</td>
  </tr>
    <tr>
      <td>'.$customerInfo->Name.'</td>
      <td>'.$customerInfo->AccountNum.'</td>
    </tr>
  </table>';
  echo '<p><u>Address details:</u></p><br>';
  echo '<table><tbody><tr>';
  if(count($customerInfo->DirParty->DirPartyPostalAddressView) == 1){
      $address = $customerInfo->DirParty->DirPartyPostalAddressView;
      displayAddressDetails($address,$customerInfo,$custAccount_);

  } else {
    foreach($customerInfo->DirParty->DirPartyPostalAddressView as $address){
      displayAddressDetails($address,$customerInfo,$custAccount_);
    }
  }

  echo '</tr></tbody></table>';
  echo '<form action="addressCreateInputDetails.php" method="POST">
          <input type="hidden" name="customerInfo" value="'.base64_encode(serialize($customerInfo)).'">
          <input type="hidden" name="account" value="'.$custAccount_.'">
          <input type="submit" value="Create new address">
        </form>';
  echo '<br><p><u>Contact details</u></p>';
  echo '<table><tbody><tr>';
  if(count($customerInfo->DirParty->DirPartyContactInfoView) == 1){
      $contact = $customerInfo->DirParty->DirPartyContactInfoView;
      displayContactInformationDetails($contact,$customerInfo,$custAccount_);

  } else {
    foreach($customerInfo->DirParty->DirPartyContactInfoView as $contact){
      displayContactInformationDetails($contact,$customerInfo,$custAccount_);
    }
  }
  echo '</tr></tbody></table>';
  echo '<form action="contactCreateInputDetails.php" method="POST">
      <input type="hidden" name="customerInfo" value="'.base64_encode(serialize($customerInfo)).'">
      <input type="hidden" name="account" value="'.$custAccount_.'">
      <input type="submit" value="Create new contact">
  </form>';
}

function rediretToCustomerDetails($custAccount_){
  echo '<form action="getCustomerDetails.php" method="post" name="form">
          <input type="hidden" name="per1" value="'.$custAccount_.'">
          </form>
          <script language="JavaScript">
              document.form.submit();
            </script>';
}
?>
