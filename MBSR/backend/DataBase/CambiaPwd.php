<?php
function cambia_pwd($tabella,$colPwd,$pwdNew,$dove,$posizione,$dove2,$posizione2,$dove3,$posizione3){
    
    require 'ConnectDataBase.php';
    
    $sql= " UPDATE $tabella SET $colPwd='$pwdNew' WHERE $dove='$posizione' AND $dove2='$posizione2' AND $dove3='$posizione3'";

    if ($conn->query($sql) === TRUE) {
        global $mexpwd;
        $mexpwd= " Password aggiornata con successo!".'<br>';
    } else {
        global $mexpwd;
        $mexpwd="Error updating record: " . $conn->error.'<br>';
    }
   
    $conn->close();

}
/* Questo è un test ed HA FUNZIONATO
$pwd="123456"; //cambiare pwd per altre prove
$ema="toti@toti.it";
cambia_pwd(Anagrafica,pwd,$pwd,email,$ema,peso,56,altezza,156);
echo $mexpwd;
    */
?>