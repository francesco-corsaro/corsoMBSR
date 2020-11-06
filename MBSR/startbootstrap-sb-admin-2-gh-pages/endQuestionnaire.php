<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title>Corso  Mindfulness - Fine questionario</title>
   


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
        <p class="mb-4">Ciao <?php echo ucwords($_SESSION['name']); ?></p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert login form -->
            <div class="card shadow mb-4  border-bottom-info">
                  <div class="card-header bg-gradient-info py-3">
                    <h6 class="m-0 font-weight-bold text-white">Fine del questionario</h6>
                  </div>
                  <div class="card-body">
                        <?php echo $result;?>

                        <div class="my-2"></div>
                        <a href="https://mindfulquestionnaire.altervista.org/MBSR/logOut.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Esci</span>
                        </a>
                        <div class="my-2"></div>
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
                

                <!-- Card Body -->
                <div class="card-body ">
                <?php include "calendar.php" ; ?>
                  
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
    