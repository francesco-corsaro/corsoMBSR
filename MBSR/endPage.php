<?php
session_start();

include  'DataBase/VerificaGiorno.php';
if ($databaseDay==1) {
    $result= "<p>Error: Risposte gia presenti nel database.</p>" ;
} elseif ($databaseDay ==2 ){
    require 'DataBase/VerificaInsPost.php';
    if ($presentPost== 1 ) {
        $result= "<p>Error: Risposte gia presenti nel database.</p>" ;
        
    }else {
        require 'DataBase/CaricaRispostePost.php'; //carica le risposte nelle postTest
    }
    
}
else {
    
    
    require 'DataBase/CaricaRisposte.php'; //carica le risposte nel preTest
    
}

require 'startbootstrap-sb-admin-2-gh-pages/endQuestionnaire.php';