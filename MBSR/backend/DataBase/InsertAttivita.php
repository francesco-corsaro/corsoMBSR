<?php
function insert_3val($tabel,$colonna1,$val1,$colonna2,$val2,$colonna3,$val3) {
    
    //require 'ConnectDataBase.php';
    
   $servername = "localhost";
$username = " pspct";
$password ='' ;
$dbname = "my_lpspct";
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "INSERT INTO $tabel ($colonna1, $colonna2,$colonna3)
        VALUES ( '$val1', '$val2' , '$val3')";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Dati Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}