<?php
session_start();
require 'backend/DataBase/SelezionaId.php';

if (!empty(htmlspecialchars($_POST[email]))) {
    
    //programma per accedere
    require 'backend/Accesso.php';
}
if ($_POST['out']==1) {
    $_SESSION['bypass']=0;
}
include 'startbootstrap-sb-admin-2-gh-pages/paginaInizialePrototypeCalendario.php';

?>