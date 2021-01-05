<?php
/* Gli argomentati accettati sono due array che contengono 
 * i punteggi dei partecipanti NB: nei miei programmi la chiave è 'sample'
 *  ad esempio nel test ffmq  gli argomenti sono: $ffmqScoringPre['sample'], $ffmqScoringPost['sample']
 *  
 *  
 * L'obbiettivo della funzione è di creare un array associativo composto da
 *  due array con chiavi differenti e che al loro interno ci sia 
 *    un array che le stesse chiavi dell'altro con valori differenti(NON IDENTICI)
 *  RETURN ['pre]=>['a'=> [array..],'b'=> [array..],'c'=> [array..],...],
 *         ['post]=>['a'=> [array..],'b'=> [array..],'c'=> [array..],...]
 */
function paired_sample($arrPre, $arrPost) {
    
    

    $pairedSample=array();
    foreach ( $arrPost as $key => $value) {
        $pairedSample['pre'][$key]=$arrPre[$key];
        $pairedSample['post'][$key]=$value;
    };
    
    return $pairedSample;   
}