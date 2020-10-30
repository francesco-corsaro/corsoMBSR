var btn = document.getElementById('show');

function showPass() {
    var x = document.getElementById("inputPassword");
    var y = document.getElementById("repeatPassword");

    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}

btn.addEventListener('click', showPass);