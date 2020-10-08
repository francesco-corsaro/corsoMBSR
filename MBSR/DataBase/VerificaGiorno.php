<?php
//Questo programma controlla se nella tabella FFMQ le risposte
//sono state inserite nel giorno attuale.
//se trova una corrispondenza con la data attuale riporta il valore 1

$id=$_SESSION['codice'];
$giorno=date("Y-m-d");


require 'ConnectDataBase.php';

$sql = "SELECT Id, Name, Giorno FROM Ffmq";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["Id"]==$id && $row["Giorno"]==$giorno) {
            global $databaseDay;
            $databaseDay= 1  ; 
            global $verificadelGiorno;
            $verificadelGiorno=$row["Giorno"];
        }
        
    }
} else {
    echo "0 results";
}
$conn->close();

?>