<?php
function msp_scoring ($tabel,$optRow) {
    
    if ( $optRow!="" ) {
        $option=' WHERE edizione ='. $optRow;
    } else {
        $option="";
    }
    $flag= 0; //Questa flag serve a contare i partecipanti
    $sample= array();
    $complexMsp=0;
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel.$option." "; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            $id=$row['Id'];
            
            //sub-scale Perdita di controllo, irritabilità. First storage in array the scoring of single partecipant and then sum the scoring of all partecipants
            
            $sample[$id]['irritabilita']=($row['Q3i11']+1+$row['Q3i22']+1+$row['Q3i32']+1+$row['Q3i35']+1+$row['Q3i36']+1+$row['Q3i46']+1)/6;
            $irritabilitaGlobSam += $sample[$id]['irritabilita']; //Sum observing scoring of all partecipants
            
            //sub-scale Sensazioni psicofisiologiche:
            
            $sample[$id]['psicofiosiologico']=($row['Q3i16']+1+$row['Q3i25']+1+$row['Q3i34']+1+$row['Q3i40']+1)/4;
            $psicofiosiologicoGlobSam += $sample[$id]['psicofiosiologico'];
            
            //sub-scale Senso di sforzo e di confusione
           
            $sample[$id]['confusione']=($row['Q3i33']+1+$row['Q3i37']+1+$row['Q3i41']+1+$row['Q3i42']+1)/4;
            $confusioneGlobSam += $sample[$id]['confusione'];
            
            //sub-scale Ansia depressiva
        
            $sample[$id]['depressiva']= ($row['Q3i6']+1+$row['Q3i13']+1+$row['Q3i15']+1+$row['Q3i29']+1)/4;
            $depressivaGlobSam += $sample[$id]['depressiva'];
            
            //sub-scale Dolori e problemi fisici
            
            $sample[$id]['dolori']=($row['Q3i12']+1+$row['Q3i14']+1+$row['Q3i28']+1)/3;
            $doloriGlobSam += $sample[$id]['dolori'];
            
            //sub-scale Iperattività, accelerazione comportamenti
            
            $sample[$id]['accelerazione']=($row['Q3i26']+1+$row['Q3i44']+1+$row['Q3i45']+1)/3;
            $accelerazioneGlobSam += $sample[$id]['accelerazione'];
            
            //Complessivo msp
            for ($i = 1; $i < 50; $i++) {
                $chiave='Q3i'.$i.'';
                if ( $i==22 || $i== 24 || $i==43 || $i== 49) {
                    $complexMsp= $complexMsp+(5 - ($row[$chiave] + 1)); 
                    
                } else {
                    $complexMsp+= ($row[$chiave] +1); 
                    
                }
                                             
            }
            
            $sample[$id]['totalMsp']=$complexMsp; // Questo è il punteggio complessivo del partecipante
            
            $complexMsp=0;// assegno 0 a questa variabile in modo da utilizzarla al prossimo ciclo
            
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
$mspScoringPre = msp_scoring ('Msp',$edi);
$mspScoringPost = msp_scoring ('PostMsp',$edi);
/*/echo 'Punteggio partecipante con id 4 alla sotto scala irritabilita '.$mspScoringPre['sample'][4]['irritabilita'].'<br>';
echo 'Punteggio partecipante con id 4 alla sotto scala totale '.$mspScoringPre['sample'][4]['totalMsp'].'<br>';
echo 'punteggio media del campione alla sottoscala irritabilita '.$mspScoringPre['sottoscale']['irritabilitaGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$mspScoringPre['totalMspGlobSam'];*/


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}

function arraying_special($x){
    /* STAMPA A VIDEO I VALORI DI UN ARRAY PER ESSERE UTILIZZATO IN JAVASCRIPT
    ATTENZIONE!!!! QUESTA FUNZIONE È DEBOLE, PUÒ ESSERE USATA SOLO PER GLI ARRAY DERIVANTI DA mspScoringPre
    Siccome per la costruzione del primo grafico non mi serve il 
    il punteggio del 'totalMsp' questa funzione non lo fa stampare*/


    foreach ($x as $key => $value) {
        if ($key != 'totalMsp'){
            echo $value.",";
        }
        
        
    }
}

require 'Utility/paired.php'; //  contiene la funzione per appaiare i partecipanti = paired_sample()
$pairedSample = paired_sample($mspScoringPre['sample'], $mspScoringPost['sample']);
//var_dump($pairedSample);

require 'Utility/estraiDimensioni.php'; // chiama la funzione per creare gli array con i punteggi delle sotto dimensioni
$sottoDimensioni=estrai_dimensioni($pairedSample);
//var_dump($sottoDimensioni);
require 'Utility/medie.php'; //calcola la media complessiva alle sottoscale del campione
$mediaSottoDimensioni=medie_sottodimensioni($sottoDimensioni);
//var_dump($mediaSottoDimensioni);

?>
