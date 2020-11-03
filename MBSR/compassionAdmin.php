<?php 
include 'DataBase/calcoloPunteggi.php'; //It's a program that get scoring of the test compassion
require "startbootstrap-sb-admin-2-gh-pages/barChart.php"; //get a function that sets tag html to build a barchart

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "startbootstrap-sb-admin-2-gh-pages/head.php"; ?>
  

  <title>Compassion chart</title>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- begin navbar -->
    <?php require "startbootstrap-sb-admin-2-gh-pages/navbar.php" ?>

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Scala della Compassione di Sé</h1>
        <p class="mb-4">Reference:  Petrocchi, N., Ottaviani, C., & Couyoumdjian, A. (2014). Dimensionality of self-compassion: translation and construct validation of the self-compassion scale in an Italian sample. Journal Of Mental Health, 23(2), 72-77. Please visit the <a target="_blank" href="http://dx.doi.org/10.3109/09638237.2013.841869">official article http://dx.doi.org/10.3109/09638237.2013.841869</a>.</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert barchart -->
            <?php 
            drawBarChart("Scoring Sub-scales Compassion", "Nelle sotto dimensioni \"Giudizio verso sé\",\"Isolamento\" e \"Iper-identificazione\" i punteggi non sono stati invertiti", "CompassionSubScale");
            ?>

            <?php 
            drawBarChart(
              'Scoring Compassion and Negative/positive Subscales',
              'Il grafico rappresenta il punteggio globale del test e due sotto dimensioni: "positive" ("Gentilezza verso sé", "Umanità condivisa", "Mindfulness") e "negative"( "Giudizio verso sé","Isolamento" e "Iper-identificazione"). Nella sotto-dimensione negativi i punteggi sono stati invertiti',
              'Compassion'
            );
            ?>



          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Partecipanti al pre test e al post test</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Per una corretta misura delle differenze il campione deve essere uguale sia la pre test che al post test.
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
                                        I punteggi delle sotto-scale si ottengono calcolando la media delle risposte agli item che compongono ciascuna sotto-scala. Per ottenere il punteggio totale di compassione di sé, invertire i punteggi delle risposte agli item delle sotto-scale giudizio di sé, isolamento e iper-identificazione (cioè, 1 = 5, 2 = 4, 3 = 3. 4 = 2, 5 = 1) – e successivamente calcolare una media totale delle medie di tutte le sotto-scale. Tuttavia, al momento non ci sono dati sufficienti all’utilizzo del punteggio totale (soprattutto in territorio italiano); si preferisce quindi utilizzare le singole sotto-scale o raggruppare le sottoscale positive e le sottoscale negative in due grandi dimensioni .
                  </div>
                </div>
              </div>
            </div>


        </div>
        <!-- Footer -->
        <?php include "startbootstrap-sb-admin-2-gh-pages/footer.php" ?>
        <!-- End of Footer -->

    </div> <!-- End of Content Wrapper. This wraps all things out the sidebar and starts in "startbootstrap-sb-admin-2-gh-pages/navbar.php" -->
    
  </div>
            <!-- End of Page Wrapper -->
          
    
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
    

    <!-- my functions to show the bar chart -->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/barChartPrePost.js"></script>
  <script>

    //draw a bar cchart for subscale's compassion
    var subScalesCompassion = new creaGrafico(
        [<?php arraying($compassion['sottoscale']);?>],
        [<?php arraying($postCompassion['sottoscale']);?>],
        [
        "Gentilezza verso sé",
        "Giudizio verso sé",
        "Umanità condivisa",
        "Isolamento",
        "Mindfulness",
        "Iper-identificazione"
        ],
        document.getElementById("CompassionSubScale")
        );

    subScalesCompassion.barChart;

    var compassion = new creaGrafico(
      [<?php echo $compassion['compassioneGlob'].','.$compassion['dimensionePos'].','.$compassion['dimensioneNegat']; ?>],
      [<?php echo $postCompassion['compassioneGlob'].','.$compassion['dimensionePos'].','.$compassion['dimensioneNegat']; ?>],
      ["Compassione di Sè globale",
          "Scala dimensioni positive",
          "Scala dimensioni negative"],
      document.getElementById("Compassion")

                );
      compassion.barChart;
</script>

<!-- file to draw donut chart-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/donutChart.js"></script>
<script>
  var numberPartecipant = new creaDonut(
  <?php echo (count($compassion['sample']));?>,<?php echo (count($postCompassion['sample']));?>,
        document.getElementById("myPieChart")
);

numberPartecipant.donut;
</script>

    
</body>
</html>