<?php
session_start();
//Macchina, Motorino, Bicicletta, Piedi, CarSharing1, CarSharing2, CarSharing3, CarSharing4, BlastikLunch 
$servername = "localhost";
$username = "pspct";
$password ='' ;
$dbname = "my_pspct";

$id=$_SESSION['codice'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
 

$sql = "SELECT Macchina, Motorino, Bicicletta, Piedi, CarSharing1, CarSharing2, CarSharing3, CarSharing4, BlastikLunch FROM Attivita WHERE Id='$id' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            $somma=$value+$somma;
        } 
        
    } $_SESSION['puntot']=$somma;
}else {
    echo "0 results";
}
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT 	NomeAttivita FROM Attivita WHERE Id='$id' ORDER BY DataCompl DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $ultimo=$row['NomeAttivita'];
        break;
    }
} $_SESSION['ultAtt']=$ultimo;
    
?>
 



