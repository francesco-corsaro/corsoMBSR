<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title>Corso  Mindfulness - Accedi al corso</title>
  <style>
* {box-sizing: border-box;}
ul {list-style-type: none;}


.month {
  padding: 20px 15px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li {width: 12.5%;}
  .days li {width: 13.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li {width: 12.2%;}
  .days li {width: 14.2%;}
}
</style>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- begin navbar -->
    <?php require "navbar.php" ;?>

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Corso mindfulness based stress reduction  </h1>
        <p class="mb-4">Benvenuto al corso MBSR, da questa pagina puoi effettuare il login per partecipare al questionario</a>.</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert login form -->
            <div class="card shadow mb-4  border-bottom-info">
                  <div class="card-header bg-gradient-info py-3">
                    <h6 class="m-0 font-weight-bold text-white">Riempi i campi richiesti</h6>
                  </div>
                  <div class="card-body">
                        <form class="user">
                            <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Indirizzo email...">
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Ricordami</label>
                            </div>
                            </div>
                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                            Login
                            </a>
                            <hr>
                            
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Password dimenticata?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="register.html">Crea un Account!</a>
                        </div>
                  </div>
                </div>



          </div>

          <!-- Calendar -->
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Calendario</h6>
                </div>
                <?php
                $day=date("d");
                $month=date("F");
                $year=date("Y");
                $d=mktime(0, 0, 0, $month, 1, $year);
                $weekDay= date("N", $d);

                ?>

                <!-- Card Body -->
                <div class="card-body">
                <div class="month">      
                    <ul>
                        
                        <li>
                        <?php echo $month;?><br>
                        <span style="font-size:18px"><?php echo $year; ?></span>
                        </li>
                    </ul>
                    </div>

                    <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                    </ul>

                    <ul class="days">  
                    <?php
                    for ($i=1; $i < $weekDay; $i++) { 
                       echo '<li>&nbsp;</li>';
                    }
                    for ($i=1; $i < (date("t")+1) ; $i++) { 
                        if ($i== $day) {
                            echo '<li><span class="active">'.$i.'</span></li>';
                        } else {
                            echo '<li>'.$i.'</li>';
                        }
                    }

                    ?>
                    </ul>

                  
                </div>
              </div>

              
            </div>


        </div>
        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- End of Footer -->

    </div> <!-- End of Content Wrapper. This wraps all things out the sidebar and starts in "startbootstrap-sb-admin-2-gh-pages/navbar.php" -->
    
   </div>
   <!--         End of Page Wrapper -->
          
    
     <!-- Bootstrap core JavaScript-->
     <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
    
</body>
</html>
    