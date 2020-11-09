<?php

function Inserisci_dato($tabel, $colonna,$dato,$colonna2,$dato2,$colonna3,$dato3,$colonna4, $dato4) {
    

require 'ConnectDataBase.php';

$sql = "INSERT INTO $tabel ($colonna, $colonna2, $colonna3,$colonna4)
        VALUES ( '$dato','$dato2', '$dato3', '$dato4' ) ";
if ($conn->query($sql) === TRUE) {
    global $stato;
    $stato= " | Id caricato| ";
    
} else {
    global $stato;
    $stato="Error: " . $sql . "<br>" . $conn->error;
   
}
$conn->close();
}

/*
Prova del funzionamento
$big='alfiuccio';
Inserisci_dato('Ffmq', 'Name', $big);
echo $stato;
*/
?>
