<?php

// link del manuale https://www.yumpu.com/it/document/read/16163993/manuale-duso-crcmarionegriit-istituto-di-ricerche-
function pgwbi_scoring ($tabel,$optRow) {
    
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
            
            //sub-scale ansia. First storage in array the scoring of single partecipant and then sum the scoring of all partecipants
            $ansia=($row['Q2i5']+$row['Q2i8']+$row['Q2i17']+(5-$row['Q2i19'])+$row['Q2i22']);
            $sample[$id]['ansia']=$ansia;
            $ansiaGlobSam += $sample[$id]['ansia']; //Sum observing scoring of all partecipants
            
            //sub-scale Depressione:
            $depressione=($row['Q2i3']+(5-$row['Q2i7'])+$row['Q2i11']);
            $sample[$id]['depressione']=$depressione;
            $depressioneGlobSam += $sample[$id]['depressione'];
            
            //sub-scale Positività e benessere
            $positivita=((5-$row['Q2i1'])+(5-$row['Q2i9'])+$row['Q2i15']+$row['Q2i20']);
            $sample[$id]['positivita']=$positivita;
            $positivitaGlobSam += $sample[$id]['positivita'];
            
            //sub-scale autocontrollo
            $autocontrollo=((5-$row['Q2i4'])+(5-$row['Q2i14'])+$row['Q2i18']);
            $sample[$id]['autocontrollo']= $autocontrollo;
            $autocontrolloGlobSam += $sample[$id]['autocontrollo'];
            
            //sub-scale salute
            $salute=($row['Q2i2']+(5-$row['Q2i10'])+$row['Q2i13']);
            $sample[$id]['salute']=$salute/3;
            $saluteGlobSam += $sample[$id]['salute'];
            
            //sub-scale vitalità
            $vitalita=((5-$row['Q2i6'])+$row['Q2i12']+(5-$row['Q2i16'])+(5-$row['Q2i21']));
            $sample[$id]['vitalita']=$vitalita;
            $vitalitaGlobSam += $sample[$id]['vitalita'];
            
            //Total pgwbi.
            $totalPgwbi=$ansia+$depressione + $positivita + $autocontrollo + $salute + $vitalita;
            $sample[$id]['totalPgwbi']=$totalPgwbi;
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
$pgwbiScoringPre = pgwbi_scoring ('Pgwbi',$edi);
$pgwbiScoringPost = pgwbi_scoring ('PostPgwbi',$edi);

/*echo 'Punteggio partecipante con id 4 alla sotto scala depressione '.$pgwbiScoringPre['sample'][4]['depressione'].'<br>';
echo 'punteggio media del campione alla sottoscala describing '.$pgwbiScoringPre['sottoscale']['depressioneGlobSam'].'<br>';
echo 'Punteggio totale del campione ' .$pgwbiScoringPre['totalPgwbiGlobSam'];*/


function arraying($x){


    foreach ($x as $key => $value) {
        
        echo $value.",";
        
        
    }
}
function arraying_special($x){
    /* STAMPA A VIDEO I VALORI DI UN ARRAY PER ESSERE UTILIZZATO IN JAVASCRIPT
    ATTENZIONE!!!! QUESTA FUNZIONE È DEBOLE, PUÒ ESSERE USATA SOLO PER GLI ARRAY DERIVANTI DA pgwbiScoringPre
    Siccome per la costruzione del primo grafico non mi serve il 
    il punteggio del 'totalMsp' questa funzione non lo fa stampare*/


    foreach ($x as $key => $value) {
        if ($key != 'totalPgwbi'){
            echo $value.",";
        }
        
        
    }
}
require 'Utility/paired.php'; //  contiene la funzione per appaiare i partecipanti = paired_sample()
$pairedSample = paired_sample($pgwbiScoringPre['sample'], $pgwbiScoringPost['sample']);
//var_dump($pairedSample);

require 'Utility/estraiDimensioni.php'; // chiama la funzione per creare gli array con i punteggi delle sotto dimensioni
$sottoDimensioni=estrai_dimensioni($pairedSample);
//var_dump($sottoDimensioni);

require 'Utility/medie.php'; //calcola la media complessiva alle sottoscale del campione
$mediaSottoDimensioni=medie_sottodimensioni($sottoDimensioni);
//var_dump($mediaSottoDimensioni);



?>
