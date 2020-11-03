function creaGrafico(pntPre, pntPost, dimensione, nameChart) {

    this.preTest = {
        label: 'Pre-Test',
        data: pntPre,
        backgroundColor: 'rgba(0, 99, 132, 0.6)',
        borderColor: 'rgba(0, 99, 132, 1)',
        yAxisID: "y-axis-preTest"
    };

    this.postTest = {
        label: 'Post-Test',
        data: pntPost,
        backgroundColor: 'rgba(99, 132, 0, 0.6)',
        borderColor: 'rgba(99, 132, 0, 1)',
        yAxisID: "y-axis-postTest"
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
                id: "y-axis-preTest"
            }, {
                id: "y-axis-postTest"
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
var punteggioPre = [25, 36, 45, 37];
var punteggioPost = [29, 45, 48, 42];
var grafic = [
    "dimensione1",
    "dimensione2",
    "dimensione3",
    "dimensione4 "
];
// questo no
var densityCanvas = document.getElementById("popChart");

var Ffmq = new creaGrafico(punteggioPre, punteggioPost, grafic, densityCanvas);
Ffmq.barChart;