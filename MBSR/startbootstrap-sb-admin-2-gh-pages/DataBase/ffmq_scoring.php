<?php
//Qui posso aggiungere una seconda variabile che imposta una
//clausola WHERE per selezionare un un insieme specifico di partecipanti
function ffmq_scoring ($tabel,$optRow) {
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
            $sample[$id]['nonreactivity']=$nonreactivity/7;
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


$ffmqScoringPre = ffmq_scoring ('Ffmq',$edi);
$ffmqScoringPost = ffmq_scoring ('PostFfmq',$edi);
//QUESTA È LA FUNZIONE PER APPAIARE I PUNTEGGI DEI PARTECIPANTI
$pairedSample=array();
foreach ($ffmqScoringPost['sample'] as $key => $value) {
    $pairedSample['pre'][$key]=$ffmqScoringPre['sample'][$key];
    $pairedSample['post'][$key]=$value;
};


//i seguenti array contengono i punteggi del campione alle sotto scale, 
//SONO INSERITI SOLO I PARTECIPANTI CHE HANNO FATTO IL PRE E IL POST TEST

foreach ($pairedSample['pre'] as $key => $value) {
    $punteggiOsservarePre[$key]=$pairedSample['pre'][$key]['observing'];
    $punteggiOsservarePost[$key]=$pairedSample['post'][$key]['observing'];
    
    $punteggiDescriverePre[$key]=$pairedSample['pre'][$key]['describing'];
    $punteggiDescriverePost[$key]=$pairedSample['post'][$key]['describing'];
    
    $punteggiactAwarenessPre[$key]=$pairedSample['pre'][$key]['actAwareness'];
    $punteggiactAwarenessPost[$key]=$pairedSample['post'][$key]['actAwareness'];
    
    $puntegginonjudgingPre[$key]=$pairedSample['pre'][$key]['nonjudging'];
    $puntegginonjudgingPost[$key]=$pairedSample['post'][$key]['nonjudging'];
    
    $puntegginonreactivityPre[$key]=$pairedSample['pre'][$key]['nonreactivity'];
    $puntegginonreactivityPost[$key]=$pairedSample['post'][$key]['nonreactivity'];
    
    $punteggitotalFfmqPre[$key]=$pairedSample['pre'][$key]['totalFfmq'];
    $punteggitotalFfmqPost[$key]=$pairedSample['post'][$key]['totalFfmq'];
}


function average($parm) {
    $ave=array_sum($parm)/count($parm);
    return $ave;
}


//Punteggio medio del campione alle sotto scale
$mediaCampioneOsservarePre=average($punteggiOsservarePre);
$mediaCampioneOsservarePost=average($punteggiOsservarePost);

$mediaCampioneDescriverePre=average($punteggiDescriverePre);
$mediaCampioneDescriverePost=average($punteggiDescriverePost);

$mediaCampioneAwarenessPre=average($punteggiactAwarenessPre);
$mediaCampioneAwarenessPost=average($punteggiactAwarenessPost);

$mediaCampionenonjudgingPre=average($puntegginonjudgingPre);
$mediaCampionenonjudgingPost=average($puntegginonjudgingPost);

$mediaCampionenonreactivityPre=average($puntegginonreactivityPre);
$mediaCampionenonreactivityPost=average($puntegginonreactivityPost);

$mediaCampionetotalFfmqPre=average($punteggitotalFfmqPre);
$mediaCampionetotalFfmqPost=average($punteggitotalFfmqPost);

//I seguenti array servono per la creazione del grafico a barre
$sottoDimensioniffmqPre=[$mediaCampioneOsservarePre,$mediaCampioneDescriverePre,$mediaCampioneAwarenessPre,$mediaCampionenonjudgingPre,$mediaCampionenonreactivityPre];
$sottoDimensioniffmqPost=[$mediaCampioneOsservarePost,$mediaCampioneDescriverePost,$mediaCampioneAwarenessPost,$mediaCampionenonjudgingPost,$mediaCampionenonreactivityPost];


    

/*
 * var_dump($sottoDimensioniffmqPre);echo 'Punteggio sotto scala osservare dal $mediaCampioneOsservarePre <br>';
var_dump($ffmqScoringPre['sottoscale']);echo 'Punteggio sotto scala osservare dal $ffmqScoringPre<br>';
    

 * 
 * foreach ($ffmqScoringPre['sample'] as $key => $value) {
    echo 'Punteggio partecipante con id '.$key.'alla sotto scala describing  ffmqScoring '.$ffmqScoringPre['sample'][$key]['describing'].'<br>';
    echo 'Punteggio partecipante con id '.$key.' alla sotto scala describing  $punteggiDescriverePre[] '.$punteggiDescriverePre[$key].'<br><br><br>';
    ;
}


var_dump($ffmqScoringPre['sample']);echo ' $ffmqScoringPre<br>';
var_dump($punteggiOsservarePre);echo ' $punteggiOsservarePre<br>';
var_dump($punteggiDescriverePre);echo '<br>';
var_dump($punteggiOsservarePre);echo '<br>';
var_dump($punteggiOsservarePost);

echo 'Punteggio partecipante con id '.$i.'alla sotto scala describing  ffmqScoring '.$ffmqScoringPre['sample'][$i]['describing'].'<br>';
echo 'Punteggio partecipante con id '.$i.' alla sotto scala describing  $punteggiDescriverePre[] '.$punteggiDescriverePre[$i].'<br>';

echo '<br>';
var_dump($pairedSample['pre'][10]);echo ' Questo è il pre test<br>';
var_dump($pairedSample['post'][10]);


echo 'Punteggio partecipante con id 4 alla sotto scala describing '.$ffmqScoringPre['sample'][4]['describing'].'<br>';
echo 'Punteggio partecipante con id 4 punteggio totale '.$ffmqScoringPre['sample'][4]['totalFfmq'].'<br>';
echo 'punteggio media del campione alla sottoscala describing '.$ffmqScoringPre['sottoscale']['describingGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$ffmqScoringPre['totalFfmqGlobSam'];

foreach ($ffmqScoringPre['sample'][4] as $key =>$value) {
   echo 'Dimensione: '.$key.' punteggio: '.$value.'<br>' ;
}
*/
function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}



?>
