<?php
session_start();
require 'backend/DataBase/SelezionaId.php';

if (!empty(htmlspecialchars($_POST[email]))) {
    
    //programma per accedere
    require 'backend/Accesso.php';
}
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
if ($_SESSION['bypass'] ==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/ffmqAdmin.php') ;
}
$volta='b1p4ss';
if ($_SESSION['bypass']==$volta) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/partecipaQuestionarioPage.php') ;
}
if ($_POST['out']==1) {
    $_SESSION['bypass']=0;
}
include 'startbootstrap-sb-admin-2-gh-pages/paginaInizialePrototypeCalendario.php';

?>