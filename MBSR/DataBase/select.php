<?php
function select_val($tabel, $column,$target,$column2, $target2) {
    
    $giorno=date("Y-m-d");
    
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel." WHERE $column = '$target' AND $column2 = '$target2'  ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            global $progressivo;
            $progressivo=$row['Progressivo'];
            /*if ($row['Id']==$posizione && $row['Giorno']==$posizione2) {
              echo $row['Progressivo']."<br>";
            }else {echo 'non si trova';}
            */
           
            
           
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();

};


select_val('Compassion','Id',1,'Giorno','2020-10-09');
echo $progressivo;
?>  