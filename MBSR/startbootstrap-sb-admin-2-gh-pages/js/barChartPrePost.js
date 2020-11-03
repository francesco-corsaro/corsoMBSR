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
};



var subScalesCompassion = new creaGrafico(
    [<?php arraying($compassion['sottoscale']);?>], [], [
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
    [<?php echo $compassion['compassioneGlob'].','.$compassion['dimensionePos'].','.$compassion['dimensioneNegat']; ?>], [], ["Compassione di Sè globale",
        "Scala dimensioni positive",
        "Scala dimensioni negative"
    ],
    document.getElementById("Compassion")

);
compassion.barChart;

*/