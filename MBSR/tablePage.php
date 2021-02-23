<?php //MINDFULSICILIA
session_start();
$edition=$_GET['edition'];
$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
$iscrizioni='active';

if ($_SESSION['bypass']!==$frontEndAdmin) {
    header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
}
require 'DataBase/select_Validator.php'; //This function check if the partecipant is on the table and return 'exist'

if ($_POST['recipient-delete']=== 'elimina') {
    if (filter_var($_POST['recipient-wh'], FILTER_VALIDATE_INT) && (select_validator($_POST['recipient-wh'])==='exist')) {
        
        
        require 'DataBase/mv_other_table.php'; ///chiama la funzioneo mv_partecipant
        
        $checkDelete=mv_partecipant($_POST['recipient-wh']);
    }else {
        //$problema= '<p style="color:red">problema: POST["delete"]=  '.$_POST['recipient-delete'].' POST["recipient-wh"]=  '.filter_var($_POST['recipient-wh'], FILTER_VALIDATE_INT).' select_validator= '.select_validator($_POST['recipient-wh']) .'</p>';
        $checkDelete='<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-exclamation"></i>Ops!</strong> Qualcosa è andato storto<small> questo messaggio appare quando si prova a tornare indietro. Se desidere annullare l\'eliminazione del partecipante contatta il WebMaster</small>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
}
require "startbootstrap-sb-admin-2-gh-pages/newTables.php";

?>