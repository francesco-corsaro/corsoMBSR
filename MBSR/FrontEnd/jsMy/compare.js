var compare = document.getElementById("repeatPassword");
compare.addEventListener('focusout', compare_pwd);

function compare_pwd() {
    var pwd = document.getElementById("inputPassword").value;
    var pwd1 = document.getElementById("repeatPassword").value;
    if (pwd != pwd1) {

        document.getElementById("mex_err").setAttribute("class", "alert alert-warning text-xs");

        document.getElementById("mex_err").innerHTML = "<i class=\"fas fa-exclamation fa-lg\"></i> &nbsp;&nbsp;Le password non coincidono";
        document.getElementById("submit").disabled = true;
    } else {
        document.getElementById("mex_err").setAttribute("class", " ");
        document.getElementById("mex_err").innerHTML = "";
        document.getElementById("submit").disabled = false;
    }
}