function compare_pwd() {
    var pwd = document.getElementById("inputPassword").value;
    var pwd1 = document.getElementById("repeatPassword").value;
    if (pwd === pwd1) {
        document.getElementById("mex_err").innerHTML =
            "&#10004;   ";
        document.getElementById("mex_err").setAttribute("class", "alert alert-success");
    } else {
        document.getElementById("mex_err").innerHTML =
            "&times;";
        document.getElementById("mex_err").setAttribute("class", "alert alert-warning");
    }
}