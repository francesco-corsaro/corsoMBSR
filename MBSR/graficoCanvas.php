<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Corso mindfulness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- chart.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
</head>

<body>
    <h3>Scala della compassione di sé (The Self-Compassion Scale)</h3>
    <div class="container">
        
        <div style="width: 700px;">
            <canvas id="CompassionSubScale" width="150px" height="100px"></canvas>
        </div>
    </div>

    <script>
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

        //I seguenti array devono essere ricevuti tramite ajax
        var punteggioPre = [<?php include 'DataBase/calcoloPunteggi.php'; ?>];
        var punteggioPost = [2.9, 4.5, 4.8, 4.2, 3.1,3.2];
        var grafic = [
            "Gentilezza verso sé",
            "Giudizio verso sé",
            "Umanità condivisa",
            "Isolamento",
            "Mindfulness",
            "Iper-identificazione"
        ];
        // questo no
        var densityCanvas = document.getElementById("CompassionSubScale");

        var Ffmq = new creaGrafico(punteggioPre, punteggioPost, grafic, densityCanvas);
        Ffmq.barChart;
    </script>
    
</body>