<?php
session_start();
function visual_risp($elmnt){
    $flag=1;
    foreach ($elmnt as $valore){
        echo ' La risposta '.$flag.' è '.$valore.'<br>' ;
        $flag ++;
    }
};

/* TEST FFMQ */
$_SESSION['ffmq']=array();

array_push($_SESSION['ffmq'],$_POST['ffmq']);
visual_risp($_SESSION['ffmq'][0]);
/*FINE TEST FFMQ*/
echo ' <br>Test PGWBI<br>';
/*TEST PGWBI*/
$_SESSION['pgwbi']=array();
array_push($_SESSION['pgwbi'],$_POST['pgwbi']);
visual_risp($_SESSION['pgwbi'][0]);
/*FINE TEST PGWBI*/
 echo'<br>Test MSP<br>'; 
/* TEST MSP*/
 $_SESSION['msp']=array();
 array_push($_SESSION['msp'],$_POST['msp']);
 visual_risp($_SESSION['msp'][0]);

 echo '<br>Solo la risposta 5: '.$_SESSION['msp'][0][4].'<br>';
 //fine test msp
 
 //test stay
 echo '<br>Test Stay<br>';
 $_SESSION['stay1']=array();
 array_push($_SESSION['stay1'],$_POST['stay1']);
 visual_risp($_SESSION['stay1'][0]);
 //fine test stay1
 
 //test STAY2
 echo '<br>Test Stay2<br>';
 $_SESSION['stay2']=array();
 array_push($_SESSION['stay2'],$_POST['stay2']);
 visual_risp($_SESSION['stay2'][0]);
 //fine test stay2
 
 $_SESSION['nome']= $_POST['Name'];
 ?>
<html><body>
<?php /*
          
           echo '<br>Il nome è: '.$_SESSION['nome'];
           require 'DataBase/carica.php';
           echo '<br>'.$stato.'<br>';?></h1>
           <p><?php 
           $colonneFFMQ=array('Q1i1','Q1i2','Q1i3','Q1i4','Q1i5','Q1i6','Q1i7','Q1i8','Q1i9','Q1i10','Q1i11','Q1i12','Q1i13','Q1i14','Q1i15','Q1i16','Q1i17','Q1i18','Q1i19','Q1i20','Q1i21','Q1i22','Q1i23','Q1i24','Q1i25','Q1i26','Q1i27','Q1i28','Q1i29','Q1i30','Q1i31','Q1i32','Q1i33','Q1i34','Q1i35','Q1i36','Q1i37','Q1i38','Q1i39');
           var_dump($_SESSION['ffmq'][0]);
         /*  $flag=0;
           foreach ($_SESSION['ffmq'][0] as $risposta) {
               Carica_risp($colonneFFMQ[$flag], $risposta, 'Macchine',$_SESSION['nome'] );
                $flag++;
           }*/
   /*        echo'<br>';
           
           Carica_risp($colonneFFMQ, $_SESSION['ffmq'][0], 'Ffmq', $nome, '39');
          */ ?>
           <p><?php require 'DataBase/CaricaRisposte.php';?></p>
<a href="risposta1.php">ProvaSession</a>
</body></html>