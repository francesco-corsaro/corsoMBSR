<?php
session_start();
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}
require "startbootstrap-sb-admin-2-gh-pages/tabellaCorsi.php";

?>