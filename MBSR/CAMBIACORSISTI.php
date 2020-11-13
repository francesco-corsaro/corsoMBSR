<?php

for ($i = 1; $i < 22; $i++) {
    

$servername = "localhost";
$username = "mindfulquestionnaire";
$password ='' ;
$dbname = "my_mindfulquestionnaire";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $stato3= "Connesso";
}

$sql = "UPDATE Anagrafica SET Nome='utente$i', Cognome='utente$i' WHERE  id=$i";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();

};