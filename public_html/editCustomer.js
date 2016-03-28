var globalFormContent;

function enableFields(editButton){
  globalFormContent = editButton.parentElement.innerHTML;
  editButton.hidden = true;
  editButton.nextSibling.nextSibling.hidden = false;
  var children = editButton.parentElement.childNodes;
  for(child in children){
    var childElement = children[child];
    if(childElement.nodeName == "DIV"){
      var inputControl = childElement.firstElementChild;
      if(inputControl.nodeName == "INPUT"){
        inputControl.readOnly = false;
      }
    }
    if(childElement.nodeName == "INPUT" && childElement.type == "submit"){
      childElement.removeAttribute("disabled");
    }
  }
}

function deleteAddress(deleteButton){
  var form = deleteButton.parentElement;
  form.action="addressDelete.php";
  form.submit();
}

function deleteContact(deleteButton){
  var form = deleteButton.parentElement;
  form.action="contactDelete.php";
  form.submit();
}

function cancelEdit(cancelButton){
  cancelButton.parentElement.innerHTML = globalFormContent;
  cancelButton.hidden = true;
  cancelButton.previousSibling.previousSibling.hidden = false;
  var children = cancelButton.parentElement.childNodes;
  for(child in children){
    var childElement = children[child];
    if(childElement.nodeName == "DIV"){
      var inputControl = childElement.firstElementChild;
      if(inputControl.nodeName == "INPUT"){
        inputControl.readOnly = true;
      }
    }
    if(childElement.nodeName == "INPUT" && childElement.type == "submit"){
      childElement.setAttribute("disabled","disabled");
    }
  }
}
