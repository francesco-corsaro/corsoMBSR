<?php
function select_val($posizione, $posizione2) {
    
    $giorno=date("Y-m-d");
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT  *  FROM Compassion ";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
         /*   if ($row['Id']==$posizione && $row['Giorno']==$posizione2) {
                echo $row['Progressivo'];
            }else {echo 'non si trova';}
            
           */ 
            
            echo $row['Progressivo'];
        }
    } else {
        echo "0 results";
    }
    echo "<br>Error updating record: " . $conn->error.'<br>';
    $conn->close();

};


select_val('4','2020-10-09');

?>  