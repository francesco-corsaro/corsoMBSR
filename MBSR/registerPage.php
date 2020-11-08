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
    
    
    
}



require "startbootstrap-sb-admin-2-gh-pages/registerAutocomplete.php";

?>