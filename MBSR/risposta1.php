<?php
session_start();
$_SESSION['ffmq'];
$flag=1;
foreach ($_SESSION['ffmq'][0] as $valore){
    echo ' La risposta '.$flag.' è '.$valore.'<br>' ;
    $flag ++;
}
?>
<html><body>
<a href="Risposta.php">ProvaPost</a>
</body></html>