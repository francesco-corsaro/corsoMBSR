<?php
session_start();
$edition=$_GET['edition'];
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}
require "startbootstrap-sb-admin-2-gh-pages/newTables.php";

?>