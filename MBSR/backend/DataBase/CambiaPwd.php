<?php
function cambia_pwd($tabella,$colPwd,$pwdNew,$dove,$posizione,$dove2,$posizione2,$dove3,$posizione3){
    
    require 'ConnectDataBase.php';
    //SELECT * FROM $tabella WHERE 
    $sql= " SELECT * FROM $tabella WHERE  $dove='$posizione' AND $dove2='$posizione2' AND $dove3='$posizione3'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id=$row["Id"];
            $stat=true;
        }
    } else {
        $stat=false;
        return false;
    }
    $conn->close();
    /////////////////////////////////////////////////
    if ($stat==true) {
        
    
        require 'ConnectDataBase.php';
        
        $sql= " UPDATE $tabella SET $colPwd='$pwdNew' WHERE Id='$id'";
    
        if ($conn->query($sql) === TRUE) {
            global $mexpwd;
            $mexpwd= " Password aggiornata con successo!".'<br>';
        } else {
            global $mexpwd;
            $mexpwd="Error updating record: " . $conn->error.'<br>';
        }
       
        $conn->close();
        
        return true;
    } 
}
/* Questo è un test ed HA FUNZIONATO
$pwd="123456"; //cambiare pwd per altre prove
$ema="toti@toti.it";
cambia_pwd(Anagrafica,pwd,$pwd,email,$ema,peso,56,altezza,156);
echo $mexpwd;
    */
?>