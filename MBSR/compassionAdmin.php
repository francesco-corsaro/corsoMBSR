<?php 
session_start();
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}
$edi=$_GET['edition']; //get the variable to select the edition of the course
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
           drawBarChart(
            "Scoring Sub-scales Compassion",
            "Nelle sotto dimensioni \"Giudizio verso sé\",\"Isolamento\" e \"Iper-identificazione\" i punteggi non sono stati invertiti", 
            "CompassionSubScale",
             $edi
           );
            ?>

            <?php 
            drawBarChart(
              'Scoring Compassion and Negative/positive Subscales',
              'Il grafico rappresenta il punteggio globale del test e due sotto dimensioni: "positive" ("Gentilezza verso sé", "Umanità condivisa", "Mindfulness") e "negative"( "Giudizio verso sé","Isolamento" e "Iper-identificazione"). Nella sotto-dimensione negativi i punteggi sono stati invertiti',
              'Compassion',
              $edi
            );
            
                        
            $score=[$compassion['sample'],$postCompassion['sample'],[
                "Gentilezza verso sé",
                "Giudizio verso sé",
                "Giudizio verso sé R",
                "Umanità condivisa",
                "Isolamento",
                "Isolamento R",
                "Mindfulness",
                "Iper-identificazione",
                "Iper-identificazione R",
                "Globale",
                "Scale Pos.",
                "Scale Neg."
            ]];
            include 'startbootstrap-sb-admin-2-gh-pages/tableScoreCompassion.php';
            ?>



          </div>

          <!-- Colonna di destra -->
          <div class="col-xl-4 col-lg-5">
              
                  <?php 
                  $avg=[$compassion['sottoscale'],$postCompassion['sottoscale'],[
                    "Gentilezza verso sé",
                    "Giudizio verso sé",
                    "Umanità condivisa",
                    "Isolamento",
                    "Mindfulness",
                    "Iper-identificazione"
                    ]];
                    ?>
                <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tabella medie: Scala della Compassione di Sé</h6>
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
                                        I punteggi delle sotto-scale si ottengono calcolando la media delle risposte agli item che compongono ciascuna sotto-scala. Per ottenere il punteggio totale di compassione di sé, invertire i punteggi delle risposte agli item delle sotto-scale giudizio di sé, isolamento e iper-identificazione (cioè, 1 = 5, 2 = 4, 3 = 3. 4 = 2, 5 = 1) – e successivamente calcolare una media totale delle medie di tutte le sotto-scale. Tuttavia, al momento non ci sono dati sufficienti all’utilizzo del punteggio totale (soprattutto in territorio italiano); si preferisce quindi utilizzare le singole sotto-scale o raggruppare le sottoscale positive e le sottoscale negative in due grandi dimensioni .
                  </div>
                </div>
              </div>
              <!-- Grafico a ciambella -->
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
            </div>


        </div>
        <!-- Footer -->
        <?php include "startbootstrap-sb-admin-2-gh-pages/footer.php" ?>
        <!-- End of Footer -->

    </div> <!-- End of Content Wrapper. This wraps all things out the sidebar and starts in "startbootstrap-sb-admin-2-gh-pages/navbar.php" -->
    
  </div>
            <!-- End of Page Wrapper -->

            <!-- Script per la tabella di destra con i punteggi e il t-test-->
<script src="//cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>
    <script>
        let tbl= document.getElementById('Table1');
        //var punteggiCampione=<?php //echo json_encode($sottoDimensioni); ?>;


        //var a = punteggiCampione[0]['gentilezza'];
        var a =[<?php arraying($sottoDimensioni[0]['gentilezza']);?>];
        var b = [<?php arraying($sottoDimensioni[1]['gentilezza']);?>];

        var c = [<?php arraying($sottoDimensioni[0]['giudizio']);?>];
        var d = [<?php arraying($sottoDimensioni[1]['giudizio']);?>];

        var e = [<?php arraying($sottoDimensioni[0]['umanita']);?>];
        var f = [<?php arraying($sottoDimensioni[1]['umanita']);?>];

        var g = [<?php arraying($sottoDimensioni[0]['mindfulness']);?>];
        var h = [<?php arraying($sottoDimensioni[1]['mindfulness']);?>];

        var l = [<?php arraying($sottoDimensioni[0]['iperIdentificazione']);?>];
        var m = [<?php arraying($sottoDimensioni[1]['iperIdentificazione']);?>];

        var n = [<?php arraying($sottoDimensioni[0]['isolamento']);?>];
        var o = [<?php arraying($sottoDimensioni[1]['isolamento']);?>];



        function t_test(a, b) {


            let s = 0;

            for (let index = 0; index < a.length; index++) {
                s = s + (b[index] - a[index]);
                console.log(s+' a = '+a[index]+' b = '+ b[index]);

            }
            const mediaCampionaria = s / a.length;
            console.log('Media campionaaria ' + mediaCampionaria);

            //Qui calcoliamo la deviazione standard campionaria delle differenze individuali tra prima e dopo
            let diff = 0;
            for (let index = 0; index < a.length; index++) {
                diff = diff + Math.pow(((b[index] - a[index]) - mediaCampionaria), 2);

            }

            function tronca(cosa,quanto){
                quanto++;
                cosa=cosa.toString();
                if(cosa.indexOf(".")>0){
                cosa=cosa.substring(0,cosa.indexOf(".")+quanto);
                }
                cosa=parseFloat(cosa);
                return cosa;
            }
            sd = Math.sqrt(diff / (a.length - 1));
            console.log(' deviazione standard campionaria delle differenze individuali tra prima e dopo ' + sd)
            let tscore = tronca((mediaCampionaria - 0) / (sd / Math.sqrt(a.length)), 3);
            console.log('tScore = ' + tscore);
            let pvalue = tronca(jStat.ttest(tscore, a.length, 2),3);
            console.log('p Value = ' + pvalue);
            let a_X=tronca(jStat.mean(a),3);
            let a_ds = tronca(jStat.stdev(a, true),3);
            let b_X=tronca(jStat.mean(b),3);
            let b_ds = tronca(jStat.stdev(b, true),3);

            return {
                "a_X" :a_X,
                "a_ds": a_ds,
                "b_X" : b_X,
                "b_ds": b_ds,
                "tScore": tscore,
                "pValue": pvalue,
            };
        }
        
        let result1 = t_test(a, b);
        let result2= t_test(c, d);
        let result3 = t_test(e, f);
        let result4= t_test(g,h);
        let result5= t_test(l,m);
        let result6= t_test(n,o);
        let obj={'gentilezza': result1, 'giudizio' : result2, 'umanita' : result3,'mindfulness': result4, 'iperIdentificazione' : result5, 'isolamento' : result6,};

        
    </script>
        <script>

            // Con questo script disegno la tabella e inserisco i dati che ho ricavato dallo script precedente
            let corpoTab= document.getElementById('corpoTab');
            let tr= corpoTab.insertRow();
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' X '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' Ds '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' X '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' Ds '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' t-score '));
            var td = tr.insertCell();
            td.appendChild(document.createTextNode(' p-value '));
            
            tr.appendChild(td);
            for (const sottoDimensione in obj) {
                let tr= corpoTab.insertRow();
                var td = tr.insertCell();
                td.appendChild(document.createTextNode(sottoDimensione));
                for (const key in obj[sottoDimensione]) {
                    if (Object.hasOwnProperty.call(obj[sottoDimensione], key)) {
                        var td = tr.insertCell();
                        td.appendChild(document.createTextNode(obj[sottoDimensione][key]));
                        
                    }
                }
                tr.appendChild(td);
            }
            
            var description= document.getElementById('description');
            description.innerHTML='La media e il t-test sono calcolati sui '+a.length+' partecipanti che hanno risposto sia al pre-test che al post.test';

        </script>
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
      [<?php arraying($selezioneMediaSottoDimensioni[0]); ?>],
        [<?php arraying($selezioneMediaSottoDimensioni[1]); ?>],
        [<?php arraying($nomeDimensioni); ?>],
        document.getElementById("CompassionSubScale")
        );

    subScalesCompassion.barChart;

    var compassion = new creaGrafico(
      [<?php arraying($selezioneMedieGenPosNeg[0]);?>],
      [<?php arraying($selezioneMedieGenPosNeg[1]);?>],
      [<?php arraying_str($nomeDimensioniGenPosNeg);?>],
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

     <!-- Page level plugins -->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>
</body>
</html>