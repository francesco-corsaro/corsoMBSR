<?php
session_start();

//include a progragram to get scoring of the test
$edi=$_GET['edition']; //get the variable to select the edition of the course
include 'DataBase/ffmq_scoring.php' ; // !!! MODIFY !!!

require "startbootstrap-sb-admin-2-gh-pages/barChart.php"; //get a function that sets tag html to build a barchart

//Title page of head
$titlePage="FFMQ scoring"; // !!! MODIFY !!!

//Title page of body in Page heading
$titleBodyPage= "Five Facet Mindfulness Questionnaire"; // !!! MODIFY !!!

//Suggest: you can put a link in this way
//<a target="_blank" href="http://siteTarget">
//
$subParagraph = "Baer, R. A., Smith, G. T., Hopkins, J., Krietemeyer, J., & Toney, L. (2006). Using self-report assessment
methods to explore facets of mindfulness. Assessment, 13(1), 27-45";// !!! MODIFY !!!


// ***********
//DRAW THE FIRST BAR CHART

$firstChartTitle = " FFMQ Sub-scales"; // !!! MODIFY !!!

$firstChartDescription = "In questo grafico  viene presentata la media dei punteggi di tutti i partecipanti"; // !!! MODIFY !!!



//*********** END FISRT CHART */



// ***********
//DRAW THE SECOND BAR CHART

$secondChartTitle = "Punteggio globale"; // !!! MODIFY !!!

$secondChartDescription = "Il grafico si riferisce alla media del punteggio globale di tutti i partecipanti.<br> Il punteggio globale è stato calcolato divdendo per 39 la somma dei punteggi delle sottodimensioni ottenendo la media dell'item"; // !!! MODIFY !!!


//*********** END SECOND CHART */



// DONUT CHART ////

$donutTitle = "Partecipanti al pre test e al post test"; // !!! MODIFY !!!

$donutDescription= "Per una corretta misura delle differenze il campione deve essere uguale sia la pre test che al post test." ; // !!! MODIFY !!!


//END DONUT CHART ******

//Avarege tabel
$avg=[$ffmqScoringPre['sottoscale'],$ffmqScoringPost['sottoscale'],[
    "Osservare",
    "Descrivere",
    "Agire con consapevolezza",
    "Non giudicare",
    "Non reagire"

]];

//Descprtion how to calculate the scoring
//collapsable card 
$calculateScoringDescription = "Some researchers divide the total in each category by the number of items in that category to get
an average category score. The Total FFMQ can be divided by 39 to get an average item score."."<br>"; // !!! MODIFY !!!

///////////////////////////////////////

//      INCLUDE THE FRONT END

include "startbootstrap-sb-admin-2-gh-pages/frontEndChartMBSR.php";


?>
<!-- my functions to show the bar chart. 
     
From here modify php code according with the program to calculate the  scoring of the test
<script src="startbootstrap-sb-admin-2-gh-pages/js/barChartPrePost.js"></script>-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/barChartPrePost.js"></script>
<script>
  
</script>
<script >

    //draw a bar chart for subscale's compassion
    var firstChart = new creaGrafico(
        [<?php arraying($ffmqScoringPre['sottoscale']);?>], [<?php arraying($ffmqScoringPost['sottoscale']);?>], [
            "Osservare",
            "Descrivere",
            "Agire con consapevolezza",
            "Non giudicare",
            "Non reagire",

        ],
        document.getElementById("firstChart")
    );

firstChart.barChart;

var secondChart = new creaGrafico(
    [<?php echo $ffmqScoringPre['totalFfmqGlobSam']; ?>], [<?php echo $ffmqScoringPost['totalFfmqGlobSam']; ?>], ["Punteggio globale", ],
    document.getElementById("secondChart")

);
secondChart.barChart;

</script>

<!-- file to draw donut chart -->
<script src="startbootstrap-sb-admin-2-gh-pages/js/donutChart.js"></script>
<script>
  var numberPartecipant = new creaDonut(
  <?php echo (count($ffmqScoringPre['sample']));?>,<?php echo (count($ffmqScoringPost['sample']));?>,
        document.getElementById("myPieChart")
);

numberPartecipant.donut;
</script>

    
</body>
</html>
