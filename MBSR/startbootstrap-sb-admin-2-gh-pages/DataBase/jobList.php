<?php

    
    require 'ConnectDataBase.php';
    $sql = "SELECT professione FROM Anagrafica";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '"'.ucfirst($row['professione']).'",';
            
        }
    } else {
        $vargl= "0 results";
    }
    $conn->close();

?>