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
  <div style="width: 700px;">
  <canvas id="popChart" width="150px" height="100px"></canvas>
  </div>
  <script>
    var popCanvas = document.getElementById("popChart");

    var barChart= new Chart (popCanvas,{
        type:'bar',
        data:{
            labels:["China", "India", "United States", "Indonesia"],
            datasets:[{
                label:'Population',
                data: [1379302771, 1281935911, 326625791, 260580739],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ]
            }]
        }
    });
  </script>
  </body>