<?php

//include a progragram to get scoring of the test
include 'DataBase/calcoloPunteggi.php' ; // !!! MODIFY !!!

require "startbootstrap-sb-admin-2-gh-pages/barChart.php"; //get a function that sets tag html to build a barchart

//Title page of head
$titlePage="Titolo Pagina"; // !!! MODIFY !!!

//Title page of body in Page heading
$titleBodyPage= "Titolo pagina"; // !!! MODIFY !!!

//Suggest: you can put a link in this way
//<a target="_blank" href="http://siteTarget">
//
$subParagraph = "";// !!! MODIFY !!!


// ***********
//DRAW THE FIRST BAR CHART

$firstChartTitle = ""; // !!! MODIFY !!!

$firstChartDescription = ""; // !!! MODIFY !!!



//*********** END FISRT CHART */



// ***********
//DRAW THE SECOND BAR CHART

$secondChartTitle = ""; // !!! MODIFY !!!

$secondChartDescription = ""; // !!! MODIFY !!!


//*********** END SECOND CHART */



// DONUT CHART ////

$donutTitle = ""; // !!! MODIFY !!!

$donutDescription= "" ; // !!! MODIFY !!!


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
        document.getElementById("firstChart")
        );

    firstChart.barChart;

    var secondChart = new creaGrafico(
      [<?php echo $compassion['compassioneGlob'].','.$compassion['dimensionePos'].','.$compassion['dimensioneNegat']; ?>],
      [<?php echo $postCompassion['compassioneGlob'].','.$postCompassion['dimensionePos'].','.$postCompassion['dimensioneNegat']; ?>],
      ["Compassione di Sè globale",
          "Scala dimensioni positive",
          "Scala dimensioni negative"],
      document.getElementById("secondChart")

                );
    secondChart.barChart;
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
