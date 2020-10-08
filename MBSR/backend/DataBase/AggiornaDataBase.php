<?php
//Creo una funzione per caricare tutti gli altri test
function Carica_testi($colonna, $risp, $tabella,$dove, $posizione,$dove2,$posizione2){
    require 'ConnectDataBase.php';
    $flag=0;
    foreach ($risp as $risposta){
        $item=$colonna[$flag];
        //echo 'Colonna: '.$colonna[$flag].' Risposta: '.$risposta.' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
        $sql= " UPDATE $tabella SET $item='$risposta' WHERE $dove='$posizione' AND $dove2='$posizione2'";
        if ($conn->query($sql) === TRUE) {
            global $stato1;
            $stato1= " $tabella aggiornata con successo!".'<br>';
        } else {
            global $stato1;
            $stato1="Error updating record: " . $conn->error.'<br>';
        }
        
        $flag++;
    }
    $conn->close();
}

function Carica_risp($colonna, $risp, $tabella,$dove, $posizione,$dove2,$posizione2){
    require 'ConnectDataBase.php';
    $flag=0;
    foreach ($risp as $risposta){
        $item=$colonna[$flag];
        //echo 'Colonna: '.$colonna[$flag].' Risposta: '.$risposta.' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
        $sql= " UPDATE $tabella SET $item='$risposta' WHERE $dove='$posizione' AND $dove2='$posizione2'";
        if ($conn->query($sql) === TRUE) {
            global $stato1;
            $stato1= " $tabella aggiornata con successo!".'<br>';
        } else {
            global $stato1;
            $stato1="Error updating record: " . $conn->error.'<br>';
        }
        
        $flag++;
    }
    $conn->close();
}
?>