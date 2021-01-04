<?php

function select_validator($nome) {
    
    require 'ConnectDataBase.php';
    $sql = "SELECT Id FROM Anagrafica WHERE Id=".$nome."";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["Id"]==$nome) {
                
                $id= 'exist';
                
            }
            
        }
    } else {
        $id= "0 results";
    }
    $conn->close();
    
    return $id;
}


?>