<?php

function Associa_Id($nome) {
    
    require 'ConnectDataBase.php';
    $sql = "SELECT id, Name FROM Ffmq";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["Name"]==$nome) {
                global $id;
                $id= $row["id"]  ;
            }
            
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>