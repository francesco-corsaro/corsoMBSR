<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mindful - Register</title>

    <!-- Custom fonts for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bgRegister {
            background-image: url("startbootstrap-sb-admin-2-gh-pages/img/jen-theodore.jpg"); /* The image used */
            background-color: #cccccc; /* Used if the image is unavailable */
            height: 600px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bgRegister"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea un Account!</h1>
                            </div>
                            <form class="user" autocomplete="on">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstName" placeholder="Nome" required autocomplete="given-name"  >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastName" placeholder="Cognome" required autocomplete="family-name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Indirizzo Email" required autocomplete="email" >
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="input-group">
                                               
                                            <input type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password" minlength="8" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="La password deve contenere almeno   8 caratteri, una lettera maiuscola, una minuscola e un numero">
                                            <div class="input-group-append">
                                                <button class="btn bg-gray-200" type="button">
                                                    <i class="fas fa-eye fa-lg "></i>
                                                </button>
                                            </div> 
                                        </div>

                                        
                                    </div>
                                    <div class="col-sm-6 ">
                                        
                                            <input type="password" class="form-control form-control-user " id="repeatPassword" placeholder="Ripeti Password " required autocomplete="new-password">
                                        
                                            
                                                        <div id="mex_err" >
                                                            
                                                        </div>
                                            
                                        
                                    </div>    
                                   
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            Genere:
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="genere" id="gen" value="1" required>
                                                <label class="form-check-label" for="gen">M</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="genere" id="gen2" value="2" required>
                                                <label class="form-check-label" for="gen2">F</label>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control form-control-user" placeholder="Età" min="18" max="99" required>
                                        </div>
                                    </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block "
                  value="Registra Account">
                
                                <hr>
                                
                            </form>
                            <hr>
                            <div class="text-center ">
                                <a class="small " href="forgot-password.html ">Password dimenticata?</a>
                            </div>
                            <div class="text-center ">
                                <a class="small " href="login.html ">Hai già un account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--javascript for comparing and show password -->
    <script>
        var compare = document.getElementById("repeatPassword");
        compare.addEventListener('focusout',compare_pwd);

        function compare_pwd() {
            var pwd = document.getElementById("inputPassword").value;
            var pwd1 = document.getElementById("repeatPassword").value;
            if (pwd != pwd1) {
                
                document.getElementById("mex_err").setAttribute("class", "alert alert-warning text-xs");
                
                document.getElementById("mex_err").innerHTML ="<i class=\"fas fa-exclamation fa-lg\"></i> &nbsp;&nbsp;Le password non coincidono";
            } else {
                document.getElementById("mex_err").setAttribute("class", " ");
                document.getElementById("mex_err").innerHTML ="";
            }
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js "></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js "></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js "></script>

</body>

</html>