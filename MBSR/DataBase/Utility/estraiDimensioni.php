<?php
function estrai_dimensioni($pairedSample) {
   

    $i=0;
    $dimensioni=array();
    // Prelevo i nomi delle dimensioni 
    foreach ($pairedSample['pre'] as $key => $value) {
        foreach ($pairedSample['pre'][$key] as $key2 => $value2) {
            $dimensioni[$i]=$key2;
            $i ++;
        }
         break;
    }
    
    foreach ($pairedSample['pre'] as $key => $value) {
        
        for ($i = 0; $i < count($dimensioni) ; $i++) {
            $punteggioSottoDimensionePre[$dimensioni[$i]][$key]=$pairedSample['pre'][$key][$dimensioni[$i]];
            
            $punteggioSottoDimensionePost[$dimensioni[$i]][$key]=$pairedSample['post'][$key][$dimensioni[$i]];
            
        }
        
    }

    return array($punteggioSottoDimensionePre,$punteggioSottoDimensionePost);
}
