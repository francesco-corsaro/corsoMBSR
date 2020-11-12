//TASK: trasformarlo in oggetto
//email
var email1 = document.getElementById("exampleInputEmail");
var email2 = document.getElementById("exampleInputEmailR");
var emailError = document.getElementById("email_err");
var emailErrorMex = "L'email non coincide";
email2.addEventListener('focusout', function() { compare(email1, email2, emailError, emailErrorMex, btnSub), false });


//password
var trig = document.getElementById("repeatPassword");


var pwd = document.getElementById("inputPassword");
var pwd1 = document.getElementById("repeatPassword");


var pwdError = document.getElementById("mex_err");
var pwdErrorMex = "Le password non coincidono";

var btnSub = document.getElementById("submit");



function compare(firstElmnt, secondElmnt, container, mex, botton) {

    if (firstElmnt.value != secondElmnt.value) {

        container.setAttribute("class", "alert alert-warning text-xs");

        container.innerHTML = "<i class=\"fas fa-exclamation fa-lg\"></i> &nbsp;&nbsp;" + mex;
        botton.disabled = true;

    } else {
        container.setAttribute("class", " ");
        container.innerHTML = "";
        botton.disabled = false;

    }
}

trig.addEventListener('focusout', function() { compare(pwd, pwd1, pwdError, pwdErrorMex, btnSub), false });