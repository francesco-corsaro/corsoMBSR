<!DOCTYPE html>
<html lang="en">

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
        <p class="mb-4"><?php echo $subParagraph ; ?></a>.</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert barchart -->
            <?php 
            drawBarChart($firstChartTitle, $firstChartDescription, 'firstChart');
            ?>

            <?php 
            drawBarChart(
              $secondChartTitle,
              $secondChartDescription,
              'secondChart'
            );
            ?>



          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
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

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Calcolo dei punteggi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse border-bottom-info show"     id="collapseCardExample">
                  <div class="card-body">
                                        <?php echo $calculateScoringDescription ;?> 
                  </div>
                </div>
              </div>
            </div>


        </div>
        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- End of Footer -->

    </div> <!-- End of Content Wrapper. This wraps all things out the sidebar and starts in "startbootstrap-sb-admin-2-gh-pages/navbar.php" -->
    
  </div>
            <!-- End of Page Wrapper -->
          
    
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    

    