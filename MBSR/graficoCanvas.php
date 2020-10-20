<?php include 'DataBase/calcoloPunteggi.php'; ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Grafico Canvas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- chart.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        .center-block {
            margin-left:auto;
            margin-right:auto;
            display:block;
             }

        .borderShadow{
            box-shadow: 0px 0px 7px 1px #B284BE;
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 60vh;
            width: 55vw;
        }

        canvas{
            border: 1px dotted #B200ED;
        }
    </style>
</head>

<body>
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="box-shadow: 0px 0px 7px 1px #B284BE;">
  <a class="navbar-brand order-first" href="#">Mindful</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav w-100 order-0 dual-collapse2">
      <li class="nav-item">
        <a class="nav-link" href="#">DashBoard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dispense</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Mindfulness Tracks</a>
      </li>
    </ul>
  
    <ul class="navbar-nav w-100 order-last dual-collapse2 justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="#">Registrati</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Accedi</a>
      </li>    
    </ul>
  </div>  
</nav>
<br> 
<!-- End NavBar -->

<!-- PageHeader -->
<div class="container">
    <div class="page-header text-center">
        <h3>Scala della compassione di sé (The Self-Compassion Scale)</h3>
    </div>

</div>
 <!-- End PageHeader -->

    <div class="container-fluid">
    <!-- First charts Compassion SubScales  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center borderShadow mt-5 py-4">
                    <div class="jumbotron">
                        <h4>Scoring Sub-scales Compassion</h4>
                    </div>
                    <div class=" chart-container center-block">
                        <canvas id="CompassionSubScale" ></canvas>
                    </div>
                    <p class="bg-info text-white p-4 mt-5">Nelle sotto dimensioni "Giudizio verso sé","Isolamento" e "Iper-identificazione" i punteggi <mark>non</mark> sono stati invertiti</p>

                </div>
                <div class="col-sm-2"></div>
            </div> 
        </div>

    <!-- second chart Compassio Global e bidimensional -->
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center borderShadow mt-5 py-4">
                    <div class="jumbotron">
                        <h4>Scoring Compassion and Negative/positive Subscales</h4>
                    </div>
                    <div class=" chart-container center-block">
                        <canvas id="Compassion" ></canvas>
                    </div>
                    <p class="bg-info text-white mt-5 p-4">Il grafico rappresenta il punteggio globale del test e due sotto dimensioni suddivise in "positive" ("Gentilezza verso sé",
                    "Umanità condivisa",
                    "Mindfulness")
                    e "negative"( "Giudizio verso sé","Isolamento" e "Iper-identificazione"). Nella sotto-dimensione negativi i punteggi sono stati invertiti</p>

                </div>
                <div class="col-sm-2"></div>
            </div> 
        </div>
            
    </div>
            <script>
                Chart.defaults.global.defaultFontSize = 18;

                function creaGrafico(pntPre, pntPost, dimensione, nameChart) {

                    this.preTest = {
                        label: 'Pre-Test',
                        data: pntPre,
                        backgroundColor: 'rgba(0, 99, 132, 0.6)',
                        borderColor: 'rgba(0, 99, 132, 1)'
                            //yAxisID: "y-axis-preTest"
                    };

                    this.postTest = {
                        label: 'Post-Test',
                        data: pntPost,
                        backgroundColor: 'rgba(99, 132, 0, 0.6)',
                        borderColor: 'rgba(99, 132, 0, 1)'
                            //yAxisID: "y-axis-postTest"
                    };

                    this.dimensioni = {
                        labels: dimensione,
                        datasets: [this.preTest, this.postTest]
                    };

                    this.chartOptions = {
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                barPercentage: 1,
                                categoryPercentage: 0.6
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };


                    this.barChart = new Chart(nameChart, {
                        type: 'bar',
                        data: this.dimensioni,
                        options: this.chartOptions
                    });

                };

                //I seguenti array devono essere ricevuti tramite php
                //considerare se conviene utilizzare un oggetto o un array
                /*
                var subScaleCompassion = {
                    punteggioPre : [2.9, 4.5, 4.8, 4.2, 3.1,3.2],
                    punteggioPost : [2.9, 4.5, 4.8, 4.2, 3.1,3.2],
                    grafic : [
                    "Gentilezza verso sé",
                    "Giudizio verso sé",
                    "Umanità condivisa",
                    "Isolamento",
                    "Mindfulness",
                    "Iper-identificazione"
                    ],
                
                    densityCanvas : document.getElementById("CompassionSubScale"),
                };*/
                

                
                var subScalesCompassion = new creaGrafico(
                    [<?php arraying($compassion['sottoscale']);?>],
                    [], 
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
                    [],
                    ["Compassione di Sè globale",
                    "Scala bidimensionale positiva",
                    "Scala bidimensionale negativa"],
                    document.getElementById("Compassion")

                );
                compassion.barChart;


                
                
            </script>
    <footer class="jumbotron bg-dark ">
        <p class="text-white mt-5 p-4">Powered by GingiPC</p>
    </footer>
</body>
</html>