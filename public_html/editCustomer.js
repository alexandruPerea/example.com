var globalFormContent;

function cancelBuildInputForm(cancelButton){
  var createButton = cancelButton.previousSibling.previousSibling;
  createButton.hidden = false;
  cancelButton.hidden = true;

  var mainDiv = cancelButton.parentElement;
  var form = mainDiv.firstElementChild;
  form.style.display = "none";
}

function buildInputForm(createButton){
  var cancelButton = createButton.nextSibling.nextSibling;
  cancelButton.hidden = false;
  createButton.hidden = true;

  var mainDiv = createButton.parentElement;
  var form = mainDiv.firstElementChild;
  form.style.display = "block";
}

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
