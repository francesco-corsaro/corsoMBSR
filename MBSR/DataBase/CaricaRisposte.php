<?php
session_start();
//test SAty-forma2
//$_SESSION['stay2']=array();
//array_push($_SESSION['stay2'],$_POST['stay2']);

$colonneFFMQ=array('Q1i1','Q1i2','Q1i3','Q1i4','Q1i5','Q1i6','Q1i7','Q1i8','Q1i9','Q1i10','Q1i11','Q1i12','Q1i13','Q1i14','Q1i15','Q1i16','Q1i17','Q1i18','Q1i19','Q1i20','Q1i21','Q1i22','Q1i23','Q1i24','Q1i25','Q1i26','Q1i27','Q1i28','Q1i29','Q1i30','Q1i31','Q1i32','Q1i33','Q1i34','Q1i35','Q1i36','Q1i37','Q1i38','Q1i39');
$colonnePGWBI=array('Q2i1','Q2i2','Q2i3','Q2i4','Q2i5','Q2i6','Q2i7','Q2i8','Q2i9','Q2i10','Q2i11','Q2i12','Q2i13','Q2i14','Q2i15','Q2i16','Q2i17','Q2i18','Q2i19','Q2i20','Q2i21','Q2i22');
$colonneMSP=array('Q3i1','Q3i2','Q3i3','Q3i4','Q3i5','Q3i6','Q3i7','Q3i8','Q3i9','Q3i10','Q3i11','Q3i12','Q3i13','Q3i14','Q3i15','Q3i16','Q3i17','Q3i18','Q3i19','Q3i20','Q3i21','Q3i22','Q3i23','Q3i24','Q3i25','Q3i26','Q3i27','Q3i28','Q3i29','Q3i30','Q3i31','Q3i32','Q3i33','Q3i34','Q3i35','Q3i36','Q3i37','Q3i38','Q3i39','Q3i40','Q3i41','Q3i42','Q3i43','Q3i44','Q3i45','Q3i46','Q3i47','Q3i48','Q3i49');
$colonneCompassion=array('Q4i1','Q4i2','Q4i3','Q4i4','Q4i5','Q4i6','Q4i7','Q4i8','Q4i9','Q4i10','Q4i11','Q4i12','Q4i13','Q4i14','Q4i15','Q4i16','Q4i17','Q4i18','Q4i19','Q4i20','Q4i21','Q4i22','Q4i23','Q4i24','Q4i25','Q4i26');

$arrColonne=array($colonneFFMQ,$colonnePGWBI,$colonneMSP,$colonneCompassion);

$giorno=date("Y-m-d");
        //Lista di programmmi funzioni

            require 'InsertId.php'; //mi serve per chiamare la funzione inserisci_id()
            require 'Insert.php'; //chiama un programma per inserire un valore
            require 'AggiornaDataBase.php';// chiama un programma per inserire i punteggi dei test
            require 'SelezionaId.php';
            
            
        // inserisco Name
            $nome=$_SESSION['name'];
            $id=$_SESSION['codice'];
           //INSERISCE DATI NEL TEST FFMQ
            Inserisci_dato('Ffmq', 'Name', $nome,'Id',$id,'Giorno',$giorno);
            //echo $stato.'<br>';
        //associo il nome all'id
           /* Associa_Id($nome);*/
//            echo 'questo è l\'Id: '.$id.' id session'.$_SESSION['codice'].'Questo è il nome: '.$nome.'<br>';
           
        /* TEST FFMQ 
            $_SESSION['ffmq']=array();
            
            array_push($_SESSION['ffmq'],$_POST['ffmq']);*/
            Carica_risp($colonneFFMQ, $_SESSION['ffmq'][0], 'Ffmq', 'Id', $id,'Giorno',$giorno);
            //echo $stato1.'<br>'.$stato.'<br>';
        
        //test PGWBI
            Inserisci_id('Pgwbi',$id, $giorno);
            Carica_risp($colonnePGWBI, $_SESSION['pgwbi'][0], 'Pgwbi', 'Id', $id,'Giorno',$giorno);
           //echo $stato1.'<br>'.$stato.'<br>';
        
        // Test Msp   
            Inserisci_id('Msp', $id, $giorno);
            Carica_risp($colonneMSP,$_SESSION['msp'][0] , 'Msp', 'Id', $id,'Giorno',$giorno);
//            echo $stato1.'<br>'.$stato.'<br>';
        //test Compassion
            Inserisci_id('Compassion', $id, $giorno);
            Carica_risp($colonneCompassion, $_SESSION['compassion'][0], 'Compassion', 'Id', $id,'Giorno',$giorno);
            
//            echo $stato1.'<br>'.$stato.'<br>';
            
            echo'Risposte caricate correttamente.<br>Grazie per aver partecipato.'; 
            $_SESSION['bypass']="1";
    ?>
     
     
     