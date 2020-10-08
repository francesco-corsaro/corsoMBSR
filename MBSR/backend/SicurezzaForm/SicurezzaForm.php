<?php /*
function test_input($data) {
       
       $data= trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       
       
}*/
function test_input_email($data) {
    $data = htmlspecialchars($data);
    $data= trim($data);
    $data = stripslashes($data);
    $data = strtolower($data);
   //$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
     
   // check if e-mail address is well-formed && preg_match ($regex, $dato)
   if (!filter_var($data, FILTER_VALIDATE_EMAIL) ) {
        global $emailErr; 
       $emailErr = '<div class="col-12 errore">Formato email non valido</div>';
            ;  
   }else {
       global $emailStat;   
       global $email;
       $emailStat=1;        
       $email=$data;
       
   }
}
function test_input_nome($data) {
   $data = htmlspecialchars($data);
    $data= trim($data);
    $data = stripslashes($data);
    $data=strtolower($data);
    if (!preg_match("/^[a-zA-Z ]*$/",$data)) {
        global $nomeErr;
        $nomeErr= '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
        
    }else {
        global $nomeStat;global $nome;
        $nomeStat=1;
        $nome= $data;
    }
}
function test_input_cognome($data) {
    $data = htmlspecialchars($data);
    $data= trim($data);
    $data = stripslashes($data);
    $data=strtolower($data);
    if (!preg_match("/^[a-zA-Z ]*$/",$data)) {
        global$cognomeErr;
        $cognomeErr= '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
        ;
    }else {
        global$cognomeStat; 
        global $cognome;
        $cognomeStat=1;
        $cognome= $data;
    }
}
function test_input_pwd($pwd, $pwd2) {
    $pwd=htmlspecialchars($pwd);
    $pwd=trim($pwd);
    $pwd=stripslashes($pwd);
    
    $pwd2 = htmlspecialchars($pwd2);
    $pwd2 = trim($pwd2);
    $pwd2  = stripslashes($pwd2);   
    
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$pwd) && !preg_match("/^[a-zA-Z ]*$/",$pwd2) ) {
        global$pwdErr;
        $pwdErr= '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
        ;
    }elseif ($pwd!==$pwd2){
        global $pwdErr;
        $pwdErr= '<div class="col-12 errore">Le Password devono essere uguali</div>';
        ;
    }else {
        global $pwdStat;
        $pwdStat=1;
       /* $options = [
            'salt' => custom_function_for_salt(170317), //code to generate a suitable salt
            'cost' => 12 // the default cost is 10
        ];*/
        global $hash;
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        
}
    }
    
    function pwd_match($pwd) {
        $pwd=htmlspecialchars($pwd);
        $pwd=trim($pwd);
        $pwd=stripslashes($pwd);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$pwd)) {
            global$pwdErr;
            $pwdErr= '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
          
        }else {
            global $pwdStat;
            $pwdStat=1;
            global $pasword;
            $pasword=$pwd;    
        }
    }
    
    function test_input_info($info,$min, $max) {
        $info= htmlspecialchars($info);
        $info = trim($info);
        //$info  = stripslashes($info);
        if (!preg_match("/^[0-9]*$/",$info) or $info<=$min or $info>=$max) {
            global$infoErr;
            $infoErr = '<div class="col-12 errore">Formato non valido: Età, peso o altezza </div>';
            global$infoStato;
            $infoStato=0;
        }else{
            global$infoStato;
            $infoStato=1;
            global$infoStat;
            $infoStat=1;
           return $info; 
        }
    }
    ?>
