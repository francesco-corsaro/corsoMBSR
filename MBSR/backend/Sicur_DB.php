<?php
require 'DataBase/InsertRegistrazione.php';
require 'SicurezzaForm/SicurezzaForm.php';

function test_security($email,$nome,$cognome,$pwd, $pwd2,$eta,$genere,$peso,$altezza) {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($nome)) { // controlliamo se il modulo è stato inviato utilizzando $ _SERVER ["REQUEST_METHOD"]
        test_input_email($email);
        test_input_nome($nome);
        test_input_nome($cognome);
        test_input_pwd($pwd, $pwd2);
        test_input_info($eta, 15, 90);
        test_input_info($peso, 40, 120);
        test_input_info($altezza, 120, 240);
        if($emailStat==1 && $nomeStat==1 && $pwdStat==1 && $infoStat==1 ){
            Inserisci_id(Anagrafica, $nome, $cognome, $eta, $genere, $peso, $altezza, $hash, $email);
            header("location: /Coco/pagine/Login.php");
        }
     }
}
?>