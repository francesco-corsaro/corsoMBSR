<?php
$data=date('Y-m-d',strtotime("now"));
$id=1555;
require 'ConnectDataBase.php';

$sql = "SELECT  Id, Sveglia, Data FROM Registro WHERE Id='$id'  ORDER BY Data DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $det=$row['Data'];
        $sveglia=$row['Sveglia'];
        break;
    }
}
$conn->close();
$det= substr($det, 0,10);

if ($det==$data) {
    $coincidenza=1;
}else {$invito='Non hai ancora inserito l\'orario della sveglia';}



/*

//function Seleziona_sveglia($id,$tabella,$colonna,$colonna1,$colonna2) {

$data=date('d/m/Y',strtotime("now"));

require 'ConnectDataBase.php';

$sql = "SELECT  $colonna, $colonna1,$colonna2 FROM $tabella WHERE Id='$id' and Data='$data' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['sveglia']=$row['Sveglia'];
        
        return  $_SESSION['sveglia'];
        return $stato;
        break;
    }
}else {
    echo $conn->error;
    return $invito='Inserisci l\'orario in cui ti sei svegliato';
    return $stato;
}
$conn->close();


Seleziona_sveglia('1555', 'Registro', 'Id', 'Sveglia', 'Data');
echo '<br>Sveglia '.$_SESSION['sveglia'].
'<br>Invito '.$invito.
'<br>Stato '.$stato;*/
?>