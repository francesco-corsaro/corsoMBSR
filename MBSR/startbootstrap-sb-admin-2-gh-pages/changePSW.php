<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mindful - Cambia password</title>

    <!-- Custom fonts for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bgRegister {
            background-image: url("https://mindfulquestionnaire.altervista.org/MBSR/startbootstrap-sb-admin-2-gh-pages/img/annie-spratt-t3IYuQZRDNE-unsplash1.jpg"); /* The image used */
            background-color: #cccccc; /* Used if the image is unavailable */
            height: 600px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
            filter: contrast(1.2);
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
                                <h1 class="h4 text-gray-900 mb-4">Cambia password!</h1>
                                Inserisci i tuoi dati e la nuova password 
                            </div>
                            <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  autocomplete="on">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <?php echo $nomeErr.$cognomeErr;$nomeErr=$cognomeErr='';?>
                                        <input type="text" class="form-control form-control-user" name="nome" id="firstName" placeholder="Nome" required autocomplete="given-name"  >
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                <?php echo $emailErr;$emailErr='';?>
                                    <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Indirizzo Email" required autocomplete="email" >
                                </div>
                                <div class="form-group row" >
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="eta" placeholder="Età" min="18" max="99" required>
                                        <?php echo $infoErr;$infoErr='';?> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="input-group">
                                               
                                            <input type="password" name="pwd1" class="form-control form-control-user" id="inputPassword" placeholder="Password" minlength="8" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="La password deve contenere almeno   8 caratteri, una lettera maiuscola, una minuscola e un numero">
                                            <div class="input-group-append">
                                                <button id="show" class="btn bg-gray-200" type="button">
                                                    <i class="fas fa-eye fa-lg "></i>
                                                </button>
                                            </div> 
                                        </div>

                                        
                                    </div>
                                    <div class="col-sm-6 ">
                                        
                                            <input type="password" name="pwd2" class="form-control form-control-user " id="repeatPassword" placeholder="Ripeti Password " required autocomplete="new-password">
                                        
                                            
                                                        <div id="mex_err" >
                                                            <?php echo $pwdErr.$problem;?>
                                                        </div>
                                            
                                        
                                    </div>    
                                   
                                </div><hr><hr>
                                <input type="submit" id="submit" class="btn btn-primary btn-user btn-block " value="Registra Account">
                
                                
                                
                            </form>
                            <hr>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!--javascript for comparing and show password -->
    <script src="FrontEnd/jsMy/compare.js"></script>
    <script src="FrontEnd/jsMy/showPass.js"></script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js "></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js "></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js "></script>

</body>

</html>