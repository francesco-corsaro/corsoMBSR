<?php
 

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
    $stato= "Connesso".'  ';
}

 ?>














