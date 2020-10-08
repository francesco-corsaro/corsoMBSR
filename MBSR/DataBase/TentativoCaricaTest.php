<?php
//creo una funzione per caricare l'ffmq nella tabella

function Carica_risp($colonna, $risp, $tabella, $posizione){
    require 'ConnectDataBase.php';
    $flag=0;
    foreach ($risp as $risposta){
        $item=$colonna[$flag];
        //echo 'Colonna: '.$colonna[$flag].' Risposta: '.$risposta.' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
        $sql= " UPDATE $tabella SET $item='$risposta' WHERE Name='$posizione' ";
        if ($conn->query($sql) === TRUE) {
            echo "risposte aggiornate con successo!".'<br>';
        } else {
            echo "Error updating record: " . $conn->error.'<br>';
        }
        
        $flag++;
    }
    $conn->close();
}
//Creo una funzione per caricare tutti gli altri test
function Carica_test($colonna, $risp, $tabella, $posizione){
    require 'ConnectDataBase.php';
    $flag=0;
    foreach ($risp as $risposta){
        $item=$colonna[$flag];
        //echo 'Colonna: '.$colonna[$flag].' Risposta: '.$risposta.' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
        $sql= " UPDATE $tabella SET $item='$risposta' WHERE Id='$posizione' ";
        if ($conn->query($sql) === TRUE) {
            echo "risposte aggiornate con successo!".'<br>';
        } else {
            echo "Error updating record: " . $conn->error.'<br>';
        }
        
        $flag++;
    }
    $conn->close();
}