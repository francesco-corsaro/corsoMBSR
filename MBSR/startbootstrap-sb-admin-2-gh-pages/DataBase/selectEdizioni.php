<?php

    $edizioni=array();
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM Edizioni ORDER BY data DESC  ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           
            $key=$row['codice'];
            $edizioni[$key]=[$key,$row['nome']];
            
           
        }
    } else {
        echo "0 results";
    }
    $erroresql= $conn->connect_error;
    $conn->close();





?>  