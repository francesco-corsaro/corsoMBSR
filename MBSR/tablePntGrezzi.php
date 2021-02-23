<?php
session_start();
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
    
if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}else{

    require 'startbootstrap-sb-admin-2-gh-pages/punteggiGrezzi.php';
    $grezzi='font-weight-bold';
}
?>