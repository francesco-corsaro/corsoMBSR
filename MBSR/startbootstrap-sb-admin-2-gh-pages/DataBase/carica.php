<?php
require 'DataBase/ConnectDataBase.php';
$nome=$_SESSION['nome'];

/*inserisco il nome nella tab valori del database*/
$sql = "INSERT INTO Ffmq (Name)
        VALUES ( '$nome')";
    
if ($conn->query($sql) === TRUE) {
    global $stato;
    $stato= " | Nome caricato| ";
    return $stato ;
} else {
    global $stato;
    $stato="Error: " . $sql . "<br>" . $conn->error;
    return $stato;
}
$conn->close();

$test='Ffmq';
$colonneFFMQ=array("Q1.1","Q1.2","Q1.3","Q1.4","Q1.5","Q1.6","Q1.7","Q1.8","Q1.9","Q1.10","Q1.11","Q1.12","Q1.13","Q1.14","Q1.15","Q1.16","Q1.17","Q1.18","Q1.19","Q1.20","Q1.21","Q1.22","Q1.23","Q1.24","Q1.25","Q1.26","Q1.27","Q1.28","Q1.29","Q1.30","Q1.31","Q1.32","Q1.33","Q1.34","Q1.35","Q1.36","Q1.37","Q1.38","Q1.39");
echo $colonneFFMQ[9].'<br>';

function Carica_risp($colonna, $risp, $tabella, $posizione){
    require 'DataBase/ConnectDataBase.php';
    $flag=0;
    foreach ($risp as $risposta){
        $item=$colonna[$flag];
        //echo 'Colonna: '.$colonna[$flag].' Risposta: '.$risposta.' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
        $sql= " UPDATE $tabella SET $item='$risposta' WHERE Name='$posizione' ";
        if ($conn->query($sql) === TRUE) {
            //echo "risposte aggiornate con successo!".'<br>';
            $last_id = $conn->insert_id;
            echo "Nuovo utente inserito con successo. Il id è: " . $last_id.'<br>';
        } else {
            echo "Error updating record: " . $conn->error.'<br>';
        }
        
        $flag++; 
    }
    $conn->close();
}
/*for ($i = 0; $i < $numItem; $i++) {
   /*$sql= " UPDATE $tabella SET $colonna[$i]='$risp[$i]' WHERE Name='$posizione' ";
    if ($conn->query($sql) === TRUE) {
         echo $stato1 = "risposte aggiornate con successo!";
        
    } else {
        echo $stato1 =  "Error updating record: " . $conn->error;
     }   */
    /*echo 'Colonna: '.$colonna[$i].' Risposta: '.$risp[$i].' Tabella: '.$tabella.' Posizione: '.$posizione.'<br>';
    
}
}*/


    //Carica_risp($colonneFFMQ[0],$risposta, $test, $nome);
$conn->close();
?>