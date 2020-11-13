<?php
session_start();
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}


if (isset($_POST['courseName']) && isset($_POST['gg']) && isset($_POST['month']) && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['ggEnd']) && isset($_POST['monthEnd']) && isset($_POST['yearEnd'])) {
    include 'DataBase/VerificaDoppi.php';
    check_doble('Edizioni', 'nome', $_POST['courseName']);
    if ( $checkDoble == 1) {
        $doppio= '
<div class="alert alert-danger">
  <strong>Non riuscito!</strong> Esiste già un corso con questo nome
</div>';
    } elseif ($checkDoble == 0) {
        include 'DataBase/edizioni.php';
    }
    
}
require "startbootstrap-sb-admin-2-gh-pages/nuovoCorso.php";

?>