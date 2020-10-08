<?php

function Associa_Id($email,$pwd) {
    
    require 'ConnectDataBase.php';
    
    
    $sql = "SELECT Id, Email, Password FROM Anagrafica";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["Email"]==$email && $row["Password"]==$pwd) {
                global $id;
                $id= $row["Id"]  ;
            }
            
        }
    } else {
        global $id;
        $id= "0 results";
    }
    $conn->close();
}


?>