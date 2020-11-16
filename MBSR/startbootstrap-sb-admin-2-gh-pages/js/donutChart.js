// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function creaDonut(pntPre, pntPost, nameChart) {

    this.ctx = nameChart;
    this.donut = new Chart(this.ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pre-test", "Post-test"],
            datasets: [{
                data: [pntPre, pntPost],
                backgroundColor: ['rgba(78, 115, 223,0.3)', 'rgba(28, 200, 138,0.3)'],
                borderColor: ['rgba(78, 115, 223,0.5)', 'rgba(28, 200, 138,0.5)'],
                hoverBackgroundColor: ['rgba(78, 115, 223,0.6)', 'rgba(28, 200, 138,0.6)'],
                hoverBorderColor: ['rgba(78, 115, 223,0.8)', 'rgba(28, 200, 138,0.8)'],
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 80,
        },
    });

};