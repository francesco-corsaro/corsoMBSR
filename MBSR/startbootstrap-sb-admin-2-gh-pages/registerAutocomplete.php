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
            height: 800px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
        }
        /*the container must be positioned relative:*/
        .autocomplete {
          position: relative;
          display: inline-block;
        }
        
        
        
        
        
        .autocomplete-items {
          position: absolute;
          border: 1px solid #d4d4d4;
          border-bottom: none;
          border-top: none;
          z-index: 99;
          /*position the autocomplete items to be the same width as the container:*/
          top: 100%;
          left: 0;
          right: 0;
        }
        
        .autocomplete-items div {
          padding: 10px;
          cursor: pointer;
          background-color: #fff; 
          border-bottom: 1px solid #d4d4d4; 
        }
        
        /*when hovering an item:*/
        .autocomplete-items div:hover {
          background-color: #e9e9e9; 
        }
        
        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
          background-color: DodgerBlue !important; 
          color: #ffffff; 
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
                            <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  autocomplete="on">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <?php echo $nomeErr.$cognomeErr;$nomeErr=$cognomeErr='';?>
                                        <input type="text" class="form-control form-control-user" name="nome" id="firstName" placeholder="Nome" required autocomplete="given-name"  >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="cognome" id="lastName" placeholder="Cognome" required autocomplete="family-name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                <?php echo $emailErr;$emailErr='';?>
                                    <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Indirizzo Email" required autocomplete="email" >
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
                                                            <?php echo $pwdErr;?>
                                                        </div>
                                            
                                        
                                    </div>    
                                   
                                </div><hr>
                                <div class="form-group row">
                                
                                        <div class="autocomplete col-sm-6 mb-3 mb-sm-0">
                                        
        									                <input id="myInput" class="form-control form-control-user" type="text" name="myCountry" placeholder="Professione">
      										
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control form-control-user" name="eta" placeholder="Età" min="18" max="99" required>
                                            <?php echo $infoErr;$infoErr='';?> 
                                        </div>
                                    </div>
                                    <div class="form-group">
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
                                    </div><hr>
                                    <div class="form-group">
                                      
                                        Hai mai partecipato a un corso MBSR?  &nbsp;
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="partecipato" id="partecipato" value="1" required>
                                          <label class="form-check-label" for="partecipato">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="partecipato" id="partecipato2" value="2" required>
                                                <label class="form-check-label" for="partecipato2">No</label>
                                            </div>
                                      
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        Da quanti anni pratichi la Mindfulness? 
                                      </div>
                                      <div class="col-sm-5">
                                        <input type="number" name="esperienza" class="form-control form-control-user" placeholder="Anni" min="0" max="99" required>
                                      </div>
                                    </div><hr><hr>
                                    <input type="submit" id="submit" class="btn btn-primary btn-user btn-block " value="Registra Account">
                
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
    <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Agricoltore","Architetto","Attore","Autista","Barista","Cameriere / cameriera","Casalinga","Commesso/a","Cuoco/a","Disoccupato/a","Dottore / dottoressa","Falegname","Farmacista","Giornalista","Impiegato/a","Infermiere/a","Ingegnere","Insegnante","Meccanico","Medico","Muratore","Operaio/a","Pensionato/a","Professore / professoressa","Psicologo/a","Ragioniere/a","Scrittore/scrittrice","Segretaria","Studente / studentessa","Traduttore / traduttrice","Vigile del fuoco","Regista","Poliziotto","Cantante","Musicista","Idraulico","Ballerino/a",<?php include 'DataBase/jobList.php';?>];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
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