<?php
function drawBarChart($title, $description, $idCanvas,$edi){
    require 'DataBase/selectEdizioni.php';
    
    echo '
    <div class="card shadow mb-4  border-bottom-info">
                  
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">'.$title.'. Edizione: '.($edizioni[$edi][1] ? $edizioni[$edi][1] : 'Tutte le edizioni').'</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Edizioni:</div>';
                                            
                                            foreach ($edizioni as $k => $value) {
                                                echo '<a class="dropdown-item" href="'.$_SERVER["PHP_SELF"].'?edition='.$edizioni[$k][0].'">'.$edizioni[$k][1].'</a>';
                                            }
                                            
                                            
   echo'                                         <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="'.$_SERVER["PHP_SELF"].'">Mostra tutte</a>
                                        </div>
                                    </div>
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




