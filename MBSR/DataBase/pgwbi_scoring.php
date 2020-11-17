<?php
function pgwbi_scoring ($tabel,$optRow) {
    
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
            
            //sub-scale ansia. First storage in array the scoring of single partecipant and then sum the scoring of all partecipants
            $ansia=($row['Q2i5']+$row['Q2i8']+$row['Q2i17']+(5-$row['Q2i19'])+$row['Q2i22']);
            $sample[$id]['ansia']=$ansia/5;
            $ansiaGlobSam += $sample[$id]['ansia']; //Sum observing scoring of all partecipants
            
            //sub-scale Depressione:
            $depressione=($row['Q2i3']+(5-$row['Q2i7'])+$row['Q2i11']);
            $sample[$id]['depressione']=$depressione/3;
            $depressioneGlobSam += $sample[$id]['depressione'];
            
            //sub-scale Positività e benessere
            $positivita=((5-$row['Q2i1'])+(5-$row['Q2i9'])+$row['Q2i15']+$row['Q2i20']);
            $sample[$id]['positivita']=$positivita/4;
            $positivitaGlobSam += $sample[$id]['positivita'];
            
            //sub-scale autocontrollo
            $autocontrollo=((5-$row['Q2i4'])+(5-$row['Q2i14'])+$row['Q2i18']);
            $sample[$id]['autocontrollo']= $autocontrollo/3;
            $autocontrolloGlobSam += $sample[$id]['autocontrollo'];
            
            //sub-scale salute
            $salute=($row['Q2i2']+(5-$row['Q2i10'])+$row['Q2i13']);
            $sample[$id]['salute']=$salute/3;
            $saluteGlobSam += $sample[$id]['salute'];
            
            //sub-scale vitalità
            $vitalita=((5-$row['Q2i6'])+$row['Q2i12']+(5-$row['Q2i16'])+(5-$row['Q2i21']));
            $sample[$id]['vitalita']=$vitalita/4;
            $vitalitaGlobSam += $sample[$id]['vitalita'];
            
            //Total pgwbi.
            $totalPgwbi=$ansia+$depressione + $positivita + $autocontrollo + $salute + $vitalita;
            $sample[$id]['totalPgwbi']=$totalPgwbi/22;
            $totalPgwbiGlobSam += $sample[$id]['totalPgwbi'];
            
            ++$flag;
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    
    //here calculates the avarage
    $ansiaGlobSam/= $flag; 
    $depressioneGlobSam /= $flag;
    $positivitaGlobSam /= $flag;
    $autocontrolloGlobSam /= $flag;
    $saluteGlobSam /= $flag;
    $vitalitaGlobSam /= $flag;
    
    $totalPgwbiGlobSam /= $flag;
   
    
    return array(
        'sample'=>$sample,
        'totalPgwbiGlobSam' => $totalPgwbiGlobSam,
        'sottoscale'=>[
            'ansiaGlobSam' => $ansiaGlobSam, 
            'depressioneGlobSam' => $depressioneGlobSam,
            'positivitaGlobSam' => $positivitaGlobSam, 
            'autocontrolloGlobSam' => $autocontrolloGlobSam,
            'saluteGlobSam' => $saluteGlobSam,
            'vitalitaGlobSam' => $vitalitaGlobSam
            
        ]
    );
    

};
$pgwbiScoringPre = pgwbi_scoring ('Pgwbi');

echo 'Punteggio partecipante con id 4 alla sotto scala depressione '.$pgwbiScoringPre['sample'][4]['depressione'].'<br>';
echo 'punteggio media del campione alla sottoscala describing '.$pgwbiScoringPre['sottoscale']['depressioneGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$pgwbiScoringPre['totalPgwbiGlobSam'];


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}



?>
