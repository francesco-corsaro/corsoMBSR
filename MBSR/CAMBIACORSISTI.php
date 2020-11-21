<?php
$tables=['Anagrafica','Compassion','Ffmq','Msp','Pgwbi','PostCompassion','PostFfmq','PostMsp','PostPgwbi'];
foreach ($tables as $value) {
   

        for ($i = 1; $i < 22; $i++) {
            
            if ($i<6) {
                $edi=1;
            }elseif ($i<12){
                $edi=2;
            }elseif ($i<18){
                $edi=3;
            }elseif ($i<22){
                $edi=4;
            }
            
            $servername = "localhost";
            $username = "mindfulquestionnaire";
            $password ='' ;
            $dbname = "my_mindfulquestionnaire";
            
        
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }else{
                $stato3= "Connesso";
            }
            
            $sql = "UPDATE $value SET edizione='$edi' WHERE  id=$i";
            if ($conn->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        
        }
}
        