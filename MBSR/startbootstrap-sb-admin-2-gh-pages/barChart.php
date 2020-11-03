<?php
function drawBarChart($title, $description, $idCanvas){

    echo '
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">'.$title.'</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="'.$idCanvas.'"></canvas>
            </div>
            <hr>
            '.$description.'
        </div>
    </div>
    ';
};




