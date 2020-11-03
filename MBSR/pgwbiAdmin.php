<?php

//include a progragram to get scoring of the test
include 'DataBase/pgwbi_scoring.php' ; // !!! MODIFY !!!

require "startbootstrap-sb-admin-2-gh-pages/barChart.php"; //get a function that sets tag html to build a barchart

//Title page of head
$titlePage="PGWBI scoring"; // !!! MODIFY !!!

//Title page of body in Page heading
$titleBodyPage= "The Psychological General Well-Being Index (PGWBI)"; // !!! MODIFY !!!

//Suggest: you can put a link in this way
//<a target="_blank" href="http://siteTarget">
//
$subParagraph = "Dupuy H.J., 1984";// !!! MODIFY !!!


// ***********
//DRAW THE FIRST BAR CHART

$firstChartTitle = " PGWBI Sub-scales "; // !!! MODIFY !!!

$firstChartDescription = "In questo grafico  viene presentata la media delle sotto dimensioni di tutti i partecipanti"; // !!! MODIFY !!!



//*********** END FISRT CHART */



// ***********
//DRAW THE SECOND BAR CHART

$secondChartTitle = "Punteggio globale"; // !!! MODIFY !!!

$secondChartDescription = "Il grafico si riferisce alla media del punteggio globale di tutti i partecipanti.<br> Il punteggio globale è stato calcolato divdendo per 22 la somma dei punteggi delle sottodimensioni ottenendo la media dell'item"; // !!! MODIFY !!!


//*********** END SECOND CHART */



// DONUT CHART ////

$donutTitle = "Partecipanti al pre test e al post test"; // !!! MODIFY !!!

$donutDescription= "Per una corretta misura delle differenze il campione deve essere uguale sia la pre test che al post test." ; // !!! MODIFY !!!


//END DONUT CHART ******


//Descprtion how to calculate the scoring
//collapsable card 
$calculateScoringDescription = "" ; // !!! MODIFY !!!

///////////////////////////////////////

//      INCLUDE THE FRONT END

include "startbootstrap-sb-admin-2-gh-pages/frontEndChartMBSR.php";


?>
<!-- my functions to show the bar chart. 
     
From here modify php code according with the program to calculate the  scoring of the test-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/barChartPrePost.js"></script>
  <script>

    //draw a bar chart for subscale's compassion
    var firstChart = new creaGrafico(
        [<?php arraying($pgwbiScoringPre['sottoscale']);?>],
        [<?php arraying($pgwbiScoringPost['sottoscale']);?>],
        [
        "Ansia",
        "Depressione",
        "Positività e Benessere",
        "Autocontrollo",
        "Salute",
        "Vitalità"
        
        ],
        document.getElementById("firstChart")
        );

    firstChart.barChart;

    var secondChart = new creaGrafico(
      [<?php echo $pgwbiScoringPre['totalPgwbiGlobSam']; ?>],
      [<?php echo $pgwbiScoringPost['totalPgwbiGlobSam']; ?>],
      ["Punteggio globale",
        ],
      document.getElementById("secondChart")

                );
    secondChart.barChart;
</script>

<!-- file to draw donut chart-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/donutChart.js"></script>
<script>
  var numberPartecipant = new creaDonut(
  <?php echo (count($pgwbiScoringPre['sample']));?>,<?php echo (count($pgwbiScoringPost['sample']));?>,
        document.getElementById("myPieChart")
);

numberPartecipant.donut;
</script>

    
</body>
</html>
