<?php
session_start();
//include a progragram to get scoring of the test
$edi=$_GET['edition']; //get the variable to select the edition of the course
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

$secondChartTitle = "Punteggio Totale"; // !!! MODIFY !!!

$secondChartDescription = "Il grafico si riferisce alla media del punteggio totale di tutti i partecipanti."; // !!! MODIFY !!!


//*********** END SECOND CHART */



// DONUT CHART ////

$donutTitle = "Partecipanti al pre test e al post test"; // !!! MODIFY !!!

$donutDescription= "Per una corretta misura delle differenze il campione deve essere uguale sia la pre test che al post test." ; // !!! MODIFY !!!


//END DONUT CHART ******

//Avarege tabel
$avg=[$pgwbiScoringPre['sottoscale'],
$pgwbiScoringPost['sottoscale'],
[
"Ansia",
"Depressione",
"Positività e Benessere",
"Autocontrollo",
"Salute",
"Vitalità"

]];
$score=[$pgwbiScoringPre['sample'],$pgwbiScoringPost['sample']];
//Descprtion how to calculate the scoring
//collapsable card 
$calculateScoringDescription = "" ; // !!! MODIFY !!!

///////////////////////////////////////

///////////////////////////////////////////////
/// Qui impostiamo l'url per visualizzare ////
/// la tabella con le medie e il t-test   ////
/// in un altra finestra                  ////
$goto='pgwbiNewWindow.php';             ////
//////////////////////////////////////////////  
///////////////////////////////////////

//      INCLUDE THE FRONT END
if ($popUp==true) {
  // questo apre il frontend per visualizzare solo la tabella
  // con le medie e il t-test
  include "startbootstrap-sb-admin-2-gh-pages/popUpResultTable.php";
}else{
include "startbootstrap-sb-admin-2-gh-pages/frontEndChartMBSRjs.php";
}


?>
<!-- Script per la tabella con i punteggi e il t-test-->
<script src="//cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>
    <script>
        let tbl= document.getElementById('Table1')
        


        //var a = punteggiCampione[0]['gentilezza'];
        var a =[<?php arraying($sottoDimensioni[0]['ansia']);?>];
        var b = [<?php arraying($sottoDimensioni[1]['ansia']);?>];

        var c = [<?php arraying($sottoDimensioni[0]['depressione']);?>];
        var d = [<?php arraying($sottoDimensioni[1]['depressione']);?>];

        var e = [<?php arraying($sottoDimensioni[0]['positivita']);?>];
        var f = [<?php arraying($sottoDimensioni[1]['positivita']);?>];

        var g = [<?php arraying($sottoDimensioni[0]['autocontrollo']);?>];
        var h = [<?php arraying($sottoDimensioni[1]['autocontrollo']);?>];

        var l = [<?php arraying($sottoDimensioni[0]['salute']);?>];
        var m = [<?php arraying($sottoDimensioni[1]['salute']);?>];

        var n = [<?php arraying($sottoDimensioni[0]['vitalita']);?>];
        var o = [<?php arraying($sottoDimensioni[1]['vitalita']);?>];

        var p = [<?php arraying($sottoDimensioni[0]['totalPgwbi']);?>];
        var q = [<?php arraying($sottoDimensioni[1]['totalPgwbi']);?>];
        function t_test(a, b) {


            let s = 0;

            for (let index = 0; index < a.length; index++) {
                s = s + (b[index] - a[index]);
                //console.log(s);

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
            let result7= t_test(p,q);
            let obj={'Ansia': result1, 'Depressione' : result2, 'Positività_e_Benessere' : result3,'Autocontrollo': result4, 'Salute' : result5, 'Vitalità' : result6, 'Totale' :result7};
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


<!-- my functions to show the bar chart. 
     
From here modify php code according with the program to calculate the  scoring of the test-->
<script src="startbootstrap-sb-admin-2-gh-pages/js/barChartPrePost.js"></script>
  <script>

    //draw a bar chart for subscale's compassion
    var firstChart = new creaGrafico(
        [<?php arraying_special($mediaSottoDimensioni[0]);?>],
        [<?php arraying_special($mediaSottoDimensioni[1]);?>],
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
      [<?php echo $mediaSottoDimensioni[0]['totalPgwbi']; ?>],
      [<?php echo $mediaSottoDimensioni[1]['totalPgwbi']; ?>],
      ["Punteggio totale"],
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
