function validateForm() {
  var x = document.forms["myForm"]["email"].value; //da notare come vengono chiamati i valori del form
 var y = document.forms["myForm"]["pwd"].value; //da notare come vengono chiamati i valori del form
  if (x == "" && y == "" ) {
  document.getElementById("myBtn").disabled=true; //il bottone deve essere impostato su disabilita

 } else {
    document.getElementById("myBtn").disabled=false;
  }
}
