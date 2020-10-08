<?php

$Volo=strtotime("4 september 2019");
$volocon=date('d/m/Y', $Volo);
$data=strtotime("now");
$data1=date('d/m/Y',$data);//convertire la data unix nel formato desiderato
echo "<strong>Ciao </strong><em>Francesco</em><br><p>Oggi è il " .  $data1. " </p>";
echo "Andrai da Ana il $volocon <br />";
$diff=floor($Volo - $data);//per fare operazioni con le date bisogna usare la funzione floor()

$diffd=floor($diff/86400);//conversioni secondi in giorni
if ($diffd<=0){
    echo "Si parte";
}
else {
    echo "rimangono $diffd giorni";
}
$dayx=strtotime("2020-02-13");

$ieri=strtotime("tomorrow");
$d=date("d-m-Y",strtotime("today"));
echo '<br>Ieri era '.$d;
//echo $diffd;
if ($dayx==$ieri) {
    echo '<br> I giorni sono uguali<br>Oggi è'. $d;
}else {
    echo '<br> I giorni sono diversi';
}

/* function giorni($oggi, $part ){
    $smancanti=$part-$oggi;
    $ggmancanti=floor($smancanti/86400);//conversioni secondi in giorni
     //return $ggmancanti;

echo " <br><br><br><br>Rimangono $ggmancanti giorni";
}
echo giorni($oggi, $part)
*/
?>