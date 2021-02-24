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

$firstChartDescription = "Il seguente grafico mostra la media dei singoli cluster. <br> Legenda: Perdita di controllo, irritabilità = PCI; Sensazioni psicofisiologiche = SP; Senso di sforzo e di confusione = SSC; Ansia depressiva = AD; Dolori e problemi fisici = DPF; Iperattività, accelerazione comportamenti = IAC"; // !!! MODIFY !!!



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
if ($popUp==true) {
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
        var a =[<?php arraying($sottoDimensioni[0]['irritabilita']);?>];
        var b = [<?php arraying($sottoDimensioni[1]['irritabilita']);?>];

        var c = [<?php arraying($sottoDimensioni[0]['psicofiosiologico']);?>];
        var d = [<?php arraying($sottoDimensioni[1]['psicofiosiologico']);?>];

        var e = [<?php arraying($sottoDimensioni[0]['confusione']);?>];
        var f = [<?php arraying($sottoDimensioni[1]['confusione']);?>];

        var g = [<?php arraying($sottoDimensioni[0]['depressiva']);?>];
        var h = [<?php arraying($sottoDimensioni[1]['depressiva']);?>];

        var l = [<?php arraying($sottoDimensioni[0]['dolori']);?>];
        var m = [<?php arraying($sottoDimensioni[1]['dolori']);?>];

        var n = [<?php arraying($sottoDimensioni[0]['accelerazione']);?>];
        var o = [<?php arraying($sottoDimensioni[1]['accelerazione']);?>];

        var p = [<?php arraying($sottoDimensioni[0]['totalMsp']);?>];
        var q = [<?php arraying($sottoDimensioni[1]['totalMsp']);?>];


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
          let obj={'PCI': result1, 'SP' : result2, 'SSC' : result3,'AD': result4, 'DPF' : result5, 'IAC' : result6, 'Totale' :result7};
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
      [<?php echo $mediaSottoDimensioni[0]['totalMsp']; ?>],
      [<?php echo $mediaSottoDimensioni[1]['totalMsp']; ?>],
      ["Punteggio totale"],
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
