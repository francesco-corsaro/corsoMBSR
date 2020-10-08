<?php

function Inserisci_id($tabel, $num,$day) {
    

require 'ConnectDataBase.php';

$sql = "INSERT INTO $tabel (Id, Giorno)
        VALUES ( '$num', '$day' )";
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
