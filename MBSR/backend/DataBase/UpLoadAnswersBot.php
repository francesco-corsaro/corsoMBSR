<?php

function Upload_answersbot($tabella, $colonne, $risposte, $codice) {
    
    require 'InsertRegistrazione.php';
    require 'SelezionaId.php';
    require 'AggiornaDataBase.php';
   
    
        
        //creo una variabile contenente la data
        $oggi=strtotime("now");
        $oggconv=date("Y/m/d", $oggi);
        //inserirsco il codice e la data
        Insert_cod_date($tabella, $codice, $oggconv);
 
        //aggiorno la tabella in corrispondenza della data e del codice
        Carica_risp($colonne,$risposte , $tabella,'codice', $codice,'data',$oggconv);
    
}
/*ATTENZIONE: questa funzione vale solo se la tabella ha le colonne 'codice' e 'data'*/
?>