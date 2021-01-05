<?php
function average($param) {
    $ave=array_sum($param)/count($param);
    return $ave;
}


//Funzione per calcolare le medie alle sottoscale dei partecipanti
function medie_sottodimensioni($sottoDimensioni) {
        
    foreach ($sottoDimensioni as $key => $value) {
        foreach ($sottoDimensioni[$key] as $key2 => $value2) {
            $media[$key][$key2]=average($value2);
        }
    }
    return $media;
}
