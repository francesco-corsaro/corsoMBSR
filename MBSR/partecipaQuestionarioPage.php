<?php 
session_start();
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}
require "startbootstrap-sb-admin-2-gh-pages/partecipaQuestionario.php";
?>