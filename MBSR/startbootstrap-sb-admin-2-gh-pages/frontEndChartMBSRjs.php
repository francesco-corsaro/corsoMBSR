<?php //VARIABILE DI SESSIONE $frontEndAdmin
    $frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
    
    if ($_SESSION['bypass']!==$frontEndAdmin) {
        header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
    }

    $risultati='active';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title><?php echo $titlePage ; ?></title>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- begin navbar -->
    <?php require "navbar.php" ?>

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?php echo $titleBodyPage ; ?></h1>
        <p class="mb-4"><?php echo $subParagraph; ?></a>.</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert barchart -->
            <?php 
            drawBarChart($firstChartTitle, $firstChartDescription, 'firstChart',$edi);
            ?>

            <?php 
            drawBarChart(
              $secondChartTitle,
              $secondChartDescription,
              'secondChart',
              $edi
            );
            
           include 'tableScore.php';
            ?>



          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
              
                <!--avarege tabel -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tabella medie: <?php echo $titleBodyPage; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body border-bottom-info">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="Table1" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                      <th>Sotto-dimensione</th>
                              <th colspan="2">Media Pre-Test</th>
                              <th colspan="2">Media Post-Test</th>
                              <th colspan="2">T Student</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Sotto-dimensione</th>
                        <th colspan="2">Media Pre-Test</th>
                        <th colspan="2">Media Post-Test</th>
                        <th colspan="2">T Student</th>
                      </tr>
                    </tfoot>
                    <tbody id="corpoTab">
                     
                    </tbody>
                  </table>
                  </div>
                  <hr>
                  <div id="description"></div>
                </div>
              </div>

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Calcolo dei punteggi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse border-bottom-info show"     id="collapseCardExample">
                  <div class="card-body">
                                        <?php echo $calculateScoringDescription ; //var_dump($score);?> 
                  </div>
                </div>
              </div>
                      <!-- Donut Chart -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $donutTitle ; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr><?php echo $donutDescription ; ?>
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
     <!-- Page level plugins -->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>
    

    