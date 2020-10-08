<?php
$ur='Lella@vim.op';
$pas='123lella';
$codice=17;
require 'InsertRegistrazione.php';
require 'SelezionaId.php';
require 'AggiornaDataBase.php';// chiama un programma per inserire i punteggi dei test
$risp=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39);
//Associa_Id($ur, $pas);
echo 'Il tuo codice è: '.$id;

//creo una variabile contenente la data
$oggi=strtotime("now");
$oggconv=date("Y/m/d", $oggi);


//inserirsco il codice e la data
Insert_cod_date('ffmq', 17, $oggconv);
//aggiorno la tabella in corrispondenza della data e del codice 
$colonneFFMQ=array('Q1i1','Q1i2','Q1i3','Q1i4','Q1i5','Q1i6','Q1i7','Q1i8','Q1i9','Q1i10','Q1i11','Q1i12','Q1i13','Q1i14','Q1i15','Q1i16','Q1i17','Q1i18','Q1i19','Q1i20','Q1i21','Q1i22','Q1i23','Q1i24','Q1i25','Q1i26','Q1i27','Q1i28','Q1i29','Q1i30','Q1i31','Q1i32','Q1i33','Q1i34','Q1i35','Q1i36','Q1i37','Q1i38','Q1i39');
Carica_risp($colonneFFMQ, $risp, 'ffmq','codice', 17,'data',$oggconv);
echo '<br>'.$stato1;
?>