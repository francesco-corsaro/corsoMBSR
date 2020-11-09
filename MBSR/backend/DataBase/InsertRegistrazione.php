<?php

function Inserisci_id($tabel, $email ,$nome, $cognome, $genere, $eta, $pwd, $professione, $anni_esperienza, $ex_corsista,$edizione) {
    

require 'ConnectDataBase.php';
    

$sql = "INSERT INTO $tabel ( Email, Nome, Cognome, Genere, Eta, Password, professione, anni_esperienza, ex_corsista,edizione)
        VALUES ( '$email' ,'$nome', '$cognome', '$genere', '$eta', '$pwd', '$professione', '$anni_esperienza', '$ex_corsista', '$edizione')";
if ($conn->query($sql) === TRUE) {
    global $stato;
    $stato= " | Anagrafica Caricata | ";
    
} else {
    global $stato;
    $stato="Error: " . $sql . "<br>" . $conn->error;
   
}
$conn->close();
}
function Insert_cod_date($tabel,$codice, $data) {
    
    
    require 'ConnectDataBase.php';
    
    $sql = "INSERT INTO $tabel (codice, data )
        VALUES ( $codice, '$data' )";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Codice e data Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}
/*
function insert_3val12($tabel,$colonna1,$val1,$colonna2,$val2,$colonna3,$val3) {
    
    
    require 'ConnectDataBase.php';
    
    $sql = "INSERT INTO $tabel ($colonna1, $colonna2,$colonna3)
        VALUES ( '$val1', '$val2' , '$val3')";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Dati Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}
function insert_3val1($tabel,$colonna1,$val1,$colonna2,$val2,$colonna3,$val3) {
    $sql = "INSERT INTO $tabel ($colonna1, $colonna2,$colonna3)
        VALUES ( '$val1', '$val2' , '$val3')";
    
}
/*QUESTO È UN TEST DI FUNZIONAMENTO
insert_twoval(Presenze,nome,pippo,cognome,poppi,codice,22);
echo $stato*/
//Inserisci_id(Anagrafica, email, nome, cognome, 1, 22, 1235);
//echo $stato;
?>
