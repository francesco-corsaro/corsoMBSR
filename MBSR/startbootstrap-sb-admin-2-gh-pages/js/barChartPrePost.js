if (window.screen.width > 720) {
    Chart.defaults.global.defaultFontSize = 16;
}

function creaGrafico(pntPre, pntPost, dimensione, nameChart) {

    this.preTest = {
        label: 'Pre-Test',
        data: pntPre,
        borderWidth: 3,
        backgroundColor: 'rgb(0,191,255,0.3)',
        borderColor: 'rgb(30,144,255,0.3)',
        hoverBackgroundColor: 'rgb(0,191,255,0.8)',
        hoverBorderColor: 'rgb(30,144,255,0.8)',
        //yAxisID: "y-axis-preTest"
    };

    this.postTest = {
        label: 'Post-Test',
        data: pntPost,
        borderWidth: 3,
        backgroundColor: 'rgb(255,142,32, 0.3)',
        borderColor: 'rgb(255,126,0, 0.5)',
        hoverBackgroundColor: 'rgb(255,142,32,0.6)',
        hoverBorderColor: 'rgb(255,126,0,0.8)',
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
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 10,
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