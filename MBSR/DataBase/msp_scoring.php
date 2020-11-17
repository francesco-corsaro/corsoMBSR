<?php
function msp_scoring ($tabel,$optRow) {
    
    if ( $optRow!="" ) {
        $option=' WHERE edizione ='. $optRow;
    } else {
        $option="";
    }
    $flag= 1;
    $sample= array();
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel.$option." "; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            $id=$row['Id'];
            
            //sub-scale Perdita di controllo, irritabilità. First storage in array the scoring of single partecipant and then sum the scoring of all partecipants
            
            $sample[$id]['irritabilita']=($row['Q3i11']+$row['Q3i22']+$row['Q3i32']+$row['Q3i35']+$row['Q3i36']+$row['Q3i46'])/6;
            $irritabilitaGlobSam += $sample[$id]['irritabilita']; //Sum observing scoring of all partecipants
            
            //sub-scale Sensazioni psicofisiologiche:
            
            $sample[$id]['psicofiosiologico']=($row['Q3i16']+$row['Q3i25']+$row['Q3i34']+$row['Q3i40'])/4;
            $psicofiosiologicoGlobSam += $sample[$id]['psicofiosiologico'];
            
            //sub-scale Senso di sforzo e di confusione
           
            $sample[$id]['confusione']=($row['Q3i33']+$row['Q3i37']+$row['Q3i41']+$row['Q3i42'])/4;
            $confusioneGlobSam += $sample[$id]['confusione'];
            
            //sub-scale Ansia depressiva
        
            $sample[$id]['depressiva']= ($row['Q3i6']+$row['Q3i13']+$row['Q3i15']+$row['Q3i29'])/4;
            $depressivaGlobSam += $sample[$id]['depressiva'];
            
            //sub-scale Dolori e problemi fisici
            
            $sample[$id]['dolori']=($row['Q3i12']+$row['Q3i14']+$row['Q3i28'])/3;
            $doloriGlobSam += $sample[$id]['dolori'];
            
            //sub-scale Iperattività, accelerazione comportamenti
            
            $sample[$id]['accelerazione']=($row['Q3i26']+$row['Q3i44']+$row['Q3i45'])/3;
            $accelerazioneGlobSam += $sample[$id]['accelerazione'];
            
            //Complessivo msp
            for ($i = 1; $i < 50; $i++) {
                $chiave='Q3i'.$i.'';
                if ( $i==22 || $i== 24 || $i==43 || $i== 49) {
                    $complexMsp= $complexMsp+(4- $row[$chiave]); 
                    
                } else {
                    $complexMsp+= $row[$chiave]; 
                    
                }
                                             
            }
            
            $sample[$id]['totalMsp']=$complexMsp;
            
            $complexMsp=0;
            
            $totalMspGlobSam += $sample[$id]['totalMsp'];
            
            ++$flag;
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    
    //here calculates the avarage
    $irritabilitaGlobSam/= $flag; 
    $psicofiosiologicoGlobSam /= $flag;
    $confusioneGlobSam /= $flag;
    $depressivaGlobSam /= $flag;
    $doloriGlobSam /= $flag;
    $accelerazioneGlobSam /= $flag;
    
    $totalMspGlobSam /= $flag;
   
    
    return array(
        'sample'=>$sample,
        'totalMspGlobSam' => $totalMspGlobSam,
        'sottoscale'=>[
            'irritabilitaGlobSam' => $irritabilitaGlobSam, 
            'psicofiosiologicoGlobSam' => $psicofiosiologicoGlobSam,
            'confusioneGlobSam' => $confusioneGlobSam, 
            'depressivaGlobSam' => $depressivaGlobSam,
            'doloriGlobSam' => $doloriGlobSam,
            'accelerazioneGlobSam' => $accelerazioneGlobSam
            
        ]
    );
    

};
$mspScoringPre = msp_scoring ('Msp');

echo 'Punteggio partecipante con id 4 alla sotto scala irritabilita '.$mspScoringPre['sample'][4]['irritabilita'].'<br>';
echo 'Punteggio partecipante con id 4 alla sotto scala totale '.$mspScoringPre['sample'][4]['totalMsp'].'<br>';
echo 'punteggio media del campione alla sottoscala irritabilita '.$mspScoringPre['sottoscale']['irritabilitaGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$mspScoringPre['totalMspGlobSam'];


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}



?>
