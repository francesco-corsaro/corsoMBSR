<?php
function check_doble($tabel, $column, $target) {
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel." WHERE $column = '$target' ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
       
        while($row = $result->fetch_assoc()){
            if ($row["$column"]==$target ){
                //in questo caso trova un doppio 
               global $checkDoble;
               $checkDoble=1; 
            }
        }
    }else {
        //Non ha trovato doppioni
        $result= "0 results" ;
        global $checkDoble;
        $checkDoble=0; 
    }
    
    $conn->close();
}





