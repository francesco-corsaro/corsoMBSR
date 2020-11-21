<?php
session_start();
//include a progragram to get scoring of the test
$edi=$_GET['edition']; //get the variable to select the edition of the course
include 'DataBase/msp_scoring.php' ; // !!! MODIFY !!!

require "startbootstrap-sb-admin-2-gh-pages/barChart.php"; //get a function that sets tag html to build a barchart

//Title page of head
$titlePage="MSP Scoring"; // !!! MODIFY !!!

//Title page of body in Page heading
$titleBodyPage= "MSP Scoring"; // !!! MODIFY !!!

//Suggest: you can put a link in this way
//<a target="_blank" href="http://siteTarget">
//
$subParagraph = "Riferimento bibliografico mancante";// !!! MODIFY !!!


// ***********
//DRAW THE FIRST BAR CHART

$firstChartTitle = "Cluster MSP"; // !!! MODIFY !!!

$firstChartDescription = "Il seguente grafico mostra la media dei singoli cluster. <br> Legenda: Perdita di controllo, irritabilità = PCI ; Sensazioni psicofisiologiche = SP; Senso di sforzo e di confusione = SSC; Ansia depressiva = AD; Dolori e problemi fisici = DPF; Iperattività, accelerazione comportamenti = IAC"; // !!! MODIFY !!!



//*********** END FISRT CHART */



// ***********
//DRAW THE SECOND BAR CHART

$secondChartTitle = "Punteggio complessivo"; // !!! MODIFY !!!

$secondChartDescription = "Il grafico mostra la media del punteggio complessivo del campione. "; // !!! MODIFY !!!


//*********** END SECOND CHART */



// DONUT CHART ////

$donutTitle = "Partecipanti al pre test e al post test"; // !!! MODIFY !!!

$donutDescription= "Per una corretta misura delle differenze il campione deve essere uguale sia la pre test che al post test." ; // !!! MODIFY !!!


//END DONUT CHART ******
//Avarege tabel
$avg=[$mspScoringPre['sottoscale'],
$mspScoringPost['sottoscale'],[
  "PCI",
  "SP",
  "SSC",
  "AD",
  "DPF",
  "IAC"

]];

$score=[$mspScoringPre['sample'],$mspScoringPost['sample']];
//Descprtion how to calculate the scoring
//collapsable card 
$calculateScoringDescription = "<strong>CALCOLO DEL PUNTEGGIO COMPLESSIVO:</strong>
Sommare i punteggi indicati dal soggetto per ciascun item.
Per i quattro items a scoring invertito: 22, 24, 43, 49 la valutazione va fatta assegnando:
<ul>
<li> 4 punti se il soggetto ha indicato 1</li>
<li> 3 punti se il soggetto ha indicato 2</li>
<li> 2 punti se il soggetto ha indicato 3</li>
<li> 1 punto se il soggetto ha indicato 4</li>
</ul> <br>

<strong>VALUTAZIONE DEI CLUSTERS:</strong>
<ul>
<li>Cluster I – Perdita di controllo, irritabilità: Sommare i punteggi degli items: 11, 22, 32, 35, 36, 46 e dividere la somma per 6</li>
<li>Cluster II - Sensazioni psicofisiologiche: Sommare i punteggi degli items: 16, 25, 34, 40 e dividere la somma per 4</li>
<li>Cluster III - Senso di sforzo e di confusione:
Sommare i punteggi degli items: 33, 37, 41, 42 e dividere la somma per 4</li>
<li>Cluster IV - Ansia depressiva:
Sommare i punteggi degli items: 6, 13, 15, 29 e dividere la somma per 4</li>
<li>Cluster V - Dolori e problemi fisici:
Sommare i punteggi degli items: 12, 14, 28 e dividere la somma per 3</li>
<li>Cluster VI - Iperattività, accelerazione comportamenti:
Sommare i punteggi degli items: 26, 44, 45 e dividere la somma per 3</li>
</ul>" ; // !!! MODIFY !!!

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
        [<?php arraying($mspScoringPre['sottoscale']);?>],
        [<?php arraying($mspScoringPost['sottoscale']);?>],
        [
        "PCI",
        "SP",
        "SSC",
        "AD",
        "DPF",
        "IAC"
        ],
        document.getElementById("firstChart")
        );

    firstChart.barChart;

    var secondChart = new creaGrafico(
      [<?php echo $mspScoringPre['totalMspGlobSam']; ?>],
      [<?php echo $mspScoringPost['totalMspGlobSam']; ?>],
      ["Compassione di Sè globale"],
      document.getElementById("secondChart")

                );
    secondChart.barChart;
</script>

<!-- file to draw donut chart-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/donutChart.js"></script>
<script>
  var numberPartecipant = new creaDonut(
  <?php echo (count($mspScoringPre['sample']));?>,<?php echo (count($mspScoringPost['sample']));?>,
        document.getElementById("myPieChart")
);

numberPartecipant.donut;
</script>

    
</body>
</html>
