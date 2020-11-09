<?php
session_start();
// Pulizia dati input
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[nome])){
    test_input_email($_POST[email]);
    test_input_nome($_POST[nome]);
    test_input_cognome($_POST[cognome]);
    test_input_pwd($_POST[pwd1], $_POST[pwd2]);
    test_input_info( $_POST[eta], 18, 99);
    $job=test_input_word($_POST['myCountry']); //per essere valido $job[1]=1
    $exPartecipante=test_input_num($_POST['partecipato'],0, 3);
    $esperienza=test_input_num($_POST['esperienza'],-1, 99);
}

// Verifica se il contatto email è già stato inserito e Inserisce dati puliti nel database
require 'backend/DataBase/InsertRegistrazione.php'; //call Inserisci_Id

if (!empty($_POST[nome])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0 && $job[1]==1 && $exPartecipante[1]==1 && $esperienza[1]==1 ) {
    echo '<h1>arriva qui</h1>';
    require 'DataBase/VerificaDoppi.php'; //chiama la seguente funzione
    check_doble ('Anagrafica', 'Email', $email);
    
    if ($checkDoble===1) {
        $_SESSION['emailDoble']="Username  gia registrato nel database.";
        header("location: /MBSR/paginaIniziale.php");
    }else {
        require 'DataBase/getLastEdition.php';
        Inserisci_id(Anagrafica, $email, $nome, $cognome, $_POST[genere], $_POST[eta], $hash, $job[0], $esperienza[0], $exPartecipante[0],$edition);
        echo $stato;
        header("location: /MBSR/paginaIniziale.php");
        
    }
    
    
} 



require "startbootstrap-sb-admin-2-gh-pages/registerAutocomplete.php";

?>