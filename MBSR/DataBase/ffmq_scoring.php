<?php
//  QUESTO FILE È IN COMPLETO


function ffmq_scoring ($tabel) {
    
    $flag= 1;
    $sample= array();
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel." "; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()){
            $id=$row['Id'];
            
            //sub-scale Observing. First storage in array the scoring of single partecipant and then sum the scoring of all partecipants
            $observing=($row['Q1i1']+$row['Q1i6']+$row['Q1i11']+$row['Q1i15']+$row['Q1i20']+$row['Q1i26']+$row['Q1i31']+$row['Q1i36']);
            $sample[$id]['observing']=$observing/8;
            $observingGlobSam += $sample[$id]['observing']; //Sum observing scoring of all partecipants
            
            //sub-scale Describing:
            
            $describing=($row['Q1i2']+$row['Q1i7']+(6-$row['Q1i12'])+(6-$row['Q1i16'])+(6-$row['Q1i22'])+$row['Q1i27']+$row['Q1i32']+$row['Q1i37']);
            $sample[$id]['describing']=$describing/8;
            $describingGlobSam += $sample[$id]['describing'];
            
            //sub-scale Acting with Awareness
            $awareness=((6-$row['Q1i5'])+(6-$row['Q1i8'])+(6-$row['Q1i13'])+(6-$row['Q1i18'])+(6-$row['Q1i23'])+(6-$row['Q1i28'])+(6-$row['Q1i34'])+(6-$row['Q1i38']));
            $sample[$id]['actAwareness']=$awareness/8;
            $actAwarenessGlobSam += $sample[$id]['actAwareness'];
            
            //sub-scale Nonjudging
            $nonjudging=((6-$row['Q1i3'])+(6-$row['Q1i10'])+(6-$row['Q1i14'])+(6-$row['Q1i17'])+(6-$row['Q1i25'])+(6-$row['Q1i30'])+(6-$row['Q1i35'])+(6-$row['Q1i39']));
            $sample[$id]['nonjudging']=$nonjudging/8;
            $nonjudgingGlobSam += $sample[$id]['nonjudging'];
            
            //sub-scale Nonreactivity
            $nonreactivity=($row['Q1i4']+$row['Q1i9']+$row['Q1i19']+$row['Q1i21']+$row['Q1i24']+$row['Q1i29']+$row['Q1i33']);
            $sample[$id]['nonreactivity']=$nonreactivity/8;
            $nonreactivityGlobSam += $sample[$id]['nonreactivity'];
            
            //Total ffmq. add subscale scores and then divide by 39 to get an average item score.
            $sample[$id]['totalFfmq']=($observing+ $describing + $awareness + $nonjudging + $nonreactivity)/39;
            $totalFfmqGlobSam += $sample[$id]['totalFfmq'];
            
            ++$flag;
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    
    //here calculates the avarage
    $observingGlobSam/= $flag; //observing
    $describingGlobSam /= $flag;
    $actAwarenessGlobSam /= $flag;
    $nonjudgingGlobSam /= $flag;
    $nonreactivityGlobSam /= $flag;
    
    $totalFfmqGlobSam /= $flag;
   
    
    return array(
        'sample'=>$sample,
        'totalFfmqGlobSam' => $totalFfmqGlobSam,
        'sottoscale'=>[
            'observingGlobSam' => $observingGlobSam, 
            'describingGlobSam' => $describingGlobSam,
            'actAwarenessGlobSam' => $actAwarenessGlobSam, 
            'nonjudgingGlobSam' => $nonjudgingGlobSam,
            'nonreactivityGlobSam' => $nonreactivityGlobSam
        ]
    );
    

};
$ffmqScoringPre = ffmq_scoring ('Ffmq');

echo 'Punteggio partecipante con id 4 alla sotto scala describing '.$ffmqScoringPre['sample'][4]['describing'].'<br>';
echo 'punteggio media del campione alla sottoscala describing '.$ffmqScoringPre['sottoscale']['describingGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$ffmqScoringPre['totalFfmqGlobSam'];


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}



?>
