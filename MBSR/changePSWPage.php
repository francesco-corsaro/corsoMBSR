<?php 

session_start();
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[email])){
    test_input_email($_POST[email]);
    test_input_nome($_POST[nome]);
    //test_input_cognome($_POST[cognome]);
    test_input_pwd($_POST[pwd1], $_POST[pwd2]);
    test_input_info( $_POST[eta], 18, 99);
    //test_input_info($_POST[peso], 30, 150);
    //test_input_info($_POST[altezza], 110, 250); ;
    
    require 'backend/DataBase/CambiaPwd.php';
    // if (!empty($_POST[email])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0) {
    if ($emailStat==1 && $pwdStat && $infoStato!=0){
        
        if (cambia_pwd(Anagrafica,Password,$hash,Email,$email,Nome,$_POST[nome],Eta,$_POST[eta]) ==true) {
            header("location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php");
        } else {
            $problem='<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Danger!</strong> Ops..! L\'indirizzo email non è valido. Riprova o conttata gli amministratori.
                      </div>';
        }
        //$_SESSION['cambiopwd']=1;
        
    }
}
require 'startbootstrap-sb-admin-2-gh-pages/changePSW.php';

?>