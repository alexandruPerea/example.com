
function customerTypeChagned(selected) {
  if(selected.value == 'Person'){
    var companyname = document.getElementById('companyname');
    companyname.className = 'inv';
    var firstname = document.getElementById('firstname'),
        middlename = document.getElementById('middlename'),
        lastname = document.getElementById('lastname');
    firstname.className = 'vis';
    middlename.className = 'vis';
    lastname.className = 'vis';
  }

  else if(selected.value == 'Organization'){
    var firstname = document.getElementById('firstname'),
        middlename = document.getElementById('middlename'),
        lastname = document.getElementById('lastname');
    firstname.className = 'inv';
    middlename.className = 'inv';
    lastname.className = 'inv';
    var companyname = document.getElementById('companyname');
    companyname.className = 'vis';
  }
}
