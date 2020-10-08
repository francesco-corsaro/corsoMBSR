<?php
 

$servername = "localhost";
$username = "pspct";
$password ='' ;
$dbname = "my_pspct";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $stato= "Connesso".'  ';
}

 ?>














