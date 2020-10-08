<?php
    require 'SicurezzaForm/SicurezzaForm.php';
    require 'DataBase/CambiaPwd.php';

    function security_CambioPwd($email,$pwd, $pwd2,$peso,$altezza) {
        
        test_input_email($email);
        test_input_pwd($pwd, $pwd2);
        test_input_info($peso, 40, 120);
        test_input_info($altezza, 120, 240);
        
        if($emailStat==1 && $nomeStat==1 && $pwdStat==1 && $infoStat==1 ){
            cambia_pwd(Anagrafica,$pwd,$pwd2,email,$email,peso,$peso,altezza,$altezza);
   
        }else {
            global $mexpwd;
            $mexpwd="<div>Dati non inseriti correttamente</div>";
        }
        
    }
    
?>
        