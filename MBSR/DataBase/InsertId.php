<?php

function Inserisci_id($tabel, $num,$day, $edition) {
    

require 'ConnectDataBase.php';

$sql = "INSERT INTO $tabel (Id, Giorno, edizione)
        VALUES ( '$num', '$day', '$edition' )";
if ($conn->query($sql) === TRUE) {
    global $stato;
    $stato= " | Id caricato| ";
    
} else {
    global $stato;
    $stato="Error: " . $sql . "<br>" . $conn->error;
   
}
$conn->close();
}

?>
