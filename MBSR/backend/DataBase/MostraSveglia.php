<?php

// PER OCNNETTERSI AL DATABASE
    $ieri=date("Y-m-d",strtotime("yesterday"));
    
    /* $servername = "localhost";
    $username = " lucydreams";
    $password ='' ;
    $dbname = "my_lucydreams";
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);*/
    require 'ConnectDataBase.php';
  
    $sql = "SELECT  Id, Aletto FROM Registro WHERE Id='1555' AND Data='$ieri' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $aletto=$row['Aletto'];
            break;
        }
    }
    $sql = "SELECT  Id, Sveglia FROM Registro WHERE Id='1555' ORDER BY Data DESC ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $sveglia=$row['Sveglia'];
            break;
        }
    }
    
    $conn->close();

?>