<?php
function compassion_scoring ($tabel,$optRow) {
    
    if ( $optRow!="" ) {
        $option=' WHERE edizione ='. $optRow;
    } else {
        $option="";
    }
    $flag= 0;
    $sample= array();
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel.$option." "; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            $id=$row['Id'];
            $sample[$id]['id']=$id;
            $sample[$id]['gentilezza']=($row['Q4i5']+$row['Q4i12']+$row['Q4i19']+$row['Q4i23']+$row['Q4i26'])/5;
            $sample[$id]['giudizio']=($row['Q4i1']+$row['Q4i8']+$row['Q4i11']+$row['Q4i16']+$row['Q4i21'])/5;
            $sample[$id]['giudizioR']=((6-$row['Q4i1'])+(6-$row['Q4i8'])+(6-$row['Q4i11'])+(6-$row['Q4i16'])+(6-$row['Q4i21']))/5;
            $sample[$id]['umanita']=($row['Q4i3']+$row['Q4i7']+$row['Q4i10']+$row['Q4i15'])/4;
            $sample[$id]['isolamento']=($row['Q4i4']+$row['Q4i13']+$row['Q4i18']+$row['Q4i25'])/4;
            $sample[$id]['isolamentoR']=((6-$row['Q4i4'])+(6-$row['Q4i13'])+(6-$row['Q4i18'])+(6-$row['Q4i25']))/4;
            $sample[$id]['mindfulness']=($row['Q4i9']+$row['Q4i14']+$row['Q4i17']+$row['Q4i22'])/4;
            $sample[$id]['iperIdentificazione']=($row['Q4i2']+$row['Q4i6']+$row['Q4i20']+$row['Q4i24'])/4;
            $sample[$id]['iperIdentificazioneR']=((6-$row['Q4i2'])+(6-$row['Q4i6'])+(6-$row['Q4i20'])+(6-$row['Q4i24']))/4;
            
            $gentilezzaGlob += $sample[$id]['gentilezza'];
            $giudizioGlob += $sample[$id]['giudizio'];
            $umanitaGlob += $sample[$id]['umanita'];
            $isolamentoGlob += $sample[$id]['isolamento'];
            $mindfulnessGlob += $sample[$id]['mindfulness'];
            $iperIdentificazioneGlob += $sample[$id]['iperIdentificazione'];
            
            $dimensionePos = $dimensionePos + (($sample[$id]['gentilezza'] + $sample[$id]['umanita'] +  $sample[$id]['mindfulness'])/3);
            $dimensioneNegat= $dimensioneNegat + (($sample[$id]['giudizioR'] + $sample[$id]['isolamentoR'] + $sample[$id]['iperIdentificazioneR'])/3);
            
            $compassioneGlob = $compassioneGlob + (( $sample[$id]['giudizioR'] + $sample[$id]['isolamentoR'] + $sample[$id]['iperIdentificazioneR'] + $sample[$id]['gentilezza'] + $sample[$id]['umanita'] +  $sample[$id]['mindfulness'])/6);
            
            ++$flag;
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    
    $gentilezzaGlob/= $flag;
    $giudizioGlob /= $flag;
    $umanitaGlob /= $flag;
    $isolamentoGlob /= $flag;
    $mindfulnessGlob /= $flag;
    $iperIdentificazioneGlob /= $flag;
    $dimensioneNegat /= $flag;
    $dimensionePos /= $flag;
    $compassioneGlob /= $flag;
    
    return array('sample'=>$sample,
        'dimensioneNegat' => $dimensioneNegat,
        'dimensionePos' => $dimensionePos, 
        'compassioneGlob' => $compassioneGlob,
        'sottoscale'=>[
                'gentilezzaGlob' => $gentilezzaGlob, 
                'giudizioGlob' => $giudizioGlob,
                'umanitaGlob' => $umanitaGlob, 
                'isolamentoGlob' => $isolamentoGlob,
                'mindfulnessGlob' => $mindfulnessGlob,
                'iperIdentificazione' => $iperIdentificazioneGlob
        ]
    );
    

};
$compassion = compassion_scoring ('Compassion',$edi);
$postCompassion = compassion_scoring('PostCompassion',$edi);


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}


/*
echo $compassion['dimensioneNegat'].' Dimensione negativa <br>'.$compassion['dimensionePos'].' Dimensione Positiva<br>';
echo $compassion['sample'][1]['mindfulness'];
*/
?>
