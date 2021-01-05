<?php
?>
<div class="card shadow mb-4  border-bottom-info">
  <?php require 'DataBase/selectEdizioni.php'; ?>
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  	<h6 class="m-0 font-weight-bold text-primary">Edizione: <?php echo ($edizioni[$edi][1] ? $edizioni[$edi][1] : 'Tutte le edizioni') ; echo ' '.$erroresql; ?></h6>
    <div class="dropdown no-arrow">
    	<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        	<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
       </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
      	<div class="dropdown-header">Edizioni:</div>
        	 <?php 
                                            foreach ($edizioni as $k => $value) {
                                                echo '<a class="dropdown-item" href="'.$_SERVER["PHP_SELF"].'?edition='.$edizioni[$k][0].'">'.$edizioni[$k][1].'</a>';
                                            }
             ?>
                                            
       	<div class="dropdown-divider"></div>
        <a class="dropdown-item" <?php echo' href="'. $_SERVER["PHP_SELF"].'"';?>>Mostra tutte</a>
       </div>
	</div>
	</div>
    <div class="card-body">
    	<div class="table-responsive">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            	<thead>
                    <tr style="background:radial-gradient(circle, rgba(0,149,255,0.06) 2%, rgba(0,149,255,0.08) 100%)">
                      
                      <th>Id</th>
                      <th>Edizione</th>
                      <th>Tempo</th>
                      <th>Cognome</th>
                      <th>Genere</th>
                      
                      <?php 
                      foreach ($score[2] as $value) {
                          echo '<th>'.$value.'</th>';
                      }
                      ?>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="background:radial-gradient(circle, rgba(0,149,255,0.06) 2%, rgba(0,149,255,0.08) 100%)">
                    
                    <th>Id</th>
                    <th>Edizione</th>
                    <th>Tempo</th>
                    <th>Cognome</th>
                    <th>Genere</th>
                   
                      <?php 
                      foreach ($score[2] as $value) {
                          echo '<th>'.$value.'</th>';
                      }
                      ?>
                     
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $i=1;
                  
                  if($edi!=""){$where="WHERE edizione='$edi'";}
require 'DataBase/ConnectDataBase.php';
$sql = "SELECT Id, Cognome, edizione, data, Genere, permesso FROM Anagrafica $where ORDER BY Cognome";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $identif=$row['permesso'];
        if ($identif != 3 ) {
            
            $idScoring=$row['Id'];
        for ($t = 0; $t < 2; $t++) {
            if (array_key_exists( $idScoring, $score[$t]) ) {
                $tPiu=$t+1;
                if ($t==0 && array_key_exists( $idScoring, $score[$tPiu])== false  ) {
                    $bgcolor=' class= "bg-gradient-warning"';
                    
                }else {
                    $bgcolor=($t==0 ? 'style="background-color:rgb(0,191,255,0.08);"' : 'style="background-color: rgb(255,142,32, 0.08)"' );
                }
                $tempo=($t==0 ? 'Pre-test' : 'Post-test' );
            
                echo "<tr " .$bgcolor." >
                       
                        <td>".$row['Id']."</td>
                        <td>".$row['edizione']."</td>
                        <td>".$tempo."</td>
                        <td>".$row['Cognome']."</td>
                        <td>".$row['Genere']."</td>";
                foreach ($score[$t][$idScoring] as $key => $value){
                    if ($key != 'id') {
                        echo "<td>".number_format($value,3,',', ' ')."</td>";
                    }
                 }
                    
             echo      "</tr>";
            }
        }
        }
        
    }
}

?>

                  </tbody>
                </table>
              </div>
            </div>
 </div>