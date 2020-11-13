<?php
session_start();
//Creo dei permessi per bypassare il reuired 
//Creo dei permessi per bypassare il reuired
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location:  https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php") ;
}
if ($_SESSION['name']!= 'kalimero') {
    $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['pgwbi'])){
    echo 'isset vero';
    
    //Mando alla pagina successiva
    header("location:  /MBSR/MSP.php") ;
}

if (array_key_exists("21",$_POST['pgwbi'])) {
    /*TEST PGWBI*/
    $_SESSION['pgwbi']=array();
    array_push($_SESSION['pgwbi'],$_POST['pgwbi']);
    //Mando alla pagina successiva
    header("location: /MBSR/MSP.php") ;
}

$pgwbi=array(
    array("1. Nelle ultime 4 settimane, come si è sentito in generale?",
        "Di umore eccellente",
        "Di buon umore",
        "Di buon umore per la maggior parte del tempo",
        "Con molti alti e bassi di umore",
        "Giù di morale per la maggior parte del tempo",
        "Con il morale a terra"
    ),
    array("2.	Nelle ultime 4 settimane, è stato infastidito da malattie, disturbi fisici o dolori? ",
        "Tutti i giorni	",
        "Quasi tutti i giorni	",
        "Per circa metà del tempo ",
        "Più volte, ma per meno di metà del tempo	",
        "Raramente	",
        "Mai "
    ),
    array("3.	Nelle ultime 4 settimane, si è sentito depresso?",
        "Si, al punto di pensare di farla finita ",
        "Si, al punto che non mi importava più di nulla" ,
        "Si, mi sono sentito molto depresso quasi tutti i giorni" ,
        "Si, mi sono sentito piuttosto depresso parecchie volte",
        "Si, mi sono sentito un po' depresso qualche volta",
        "No, non mí sono mai sentito depresso"
    ),
    array("4. Nelle ultime 4 settimane, si è sentito padrone delle Sue situazioni, pensieri, emozioni e dei Suoi sentimenti? ",
        "Si, senz'altro	",
        "Si, quasi del tutto	",
        "Si, generalmente	",
        "Non troppo	",
        "No, e questo mi disturba un po' ",
        "No, e questo mi disturba molto "
    ),
    array("5.	Nelle ultime 4 settimane, è stato infastidito da stati di tensione o ha avuto i nervi a fior di pelle? ",
        "Enormemente, tanto da non riuscire a lavorare o ad occuparmi delle cose che dovevo fare Moltissimo	",
        "Parecchio	",
        "Abbastanza, tanto da esserne infastidito	",
        "Un po'	",
        "Per nulla "
    ),
    array("6.	Nelle ultime 4 settimane, quanta energia o vitalità ha avuto o ha sentito di avere? ",
        "Decisamente pieno di energia - molto vivace ",
        "Abbastanza pieno di energia per la maggior parte del tempo ",
        "Ho avuto notevoli alti e bassi di vitalità ed energia ",
        "ll mio livello di energia o vitalità è stato generalmente basso ",
        "Il mio livello di energia o vitalità è stato quasi sempre molto basso ",
        "Mi sono sentito senza forze, svuotato, privo di energia o vitalità "
    ),
    array("7.	Nelle ultime 4 settimane, mi sono sentito scoraggiato e triste. ",
        "Mai	",
        "Quasi mai ",
        "Una parte del tempo	",
        "Molto tempo ",
        "Quasi sempre "	,
        "Sempre	"
    ),
    array("8.	Nelle ultime 4 settimane, è stato generalmente teso o ha provato tensione? ",
        "Si, sono stato estremamente teso per tutto o quasi tutto il tempo ",
        "Si, sono stato molto teso per la maggior parte del tempo	",
        "Generalmente no,ma mi è successo diverse volte di sentirmi piuttosto teso ",
        "Alcune volte mi sono sentito un po' teso	",
        "Il mio livello di tensione è stato piuttosto basso ",
        "Non ho mai avuto la sensazione di essere teso	"
    ),
    array("9.	Nelle ultime 4 settimane, in che misura si è sentito felice, soddisfatto o contento della Sua vita personale? ",
        "Veramente molto felice-non mi sarei potuto sentire più soddisfatto o contento	",
        "Quasi sempre molto felice	",
        "In generale molto soddisfatto - contento	",
        "A volte abbastanza felice, a volte piuttosto infelice	",
        "In generale insoddisfatto o infelice	",
        "Quasi sempre o sempre molto insoddisfatto o infelice "
    ),array("10.	Nelle ultime 4 settimane, si è sentito cosi bene da fare quello che desiderava o doveva fare? ",
        "Si, decisamente ",
        "Si, per fare quasi tutto quello che desideravo o dovevo fare	",
        "I miei problemi di salute mi hanno limitato in alcune cose importanti	",
        "A causa della mia salute sono appena In grado di prendermi cura di me stesso ",
        "Ho avuto bisogno di qualche aiutp per occuparmi di me stesso	",
        "Ho avuto bisogno di aiuto per tutto o quasi tutto quello che dovevo fare	"
    ),array("11.	Nelle ultime 4 settimane, si è sentito tanto triste, scoraggiato, disperato o ha avuto tanti problemi da chiedersi se valesse la pena andare avanti? ",
        "Si, enormemente, tanto da essere quasi sul punto di lasciare perdere tutto ",
        "Si, moltissimo	",
        "Si, parecchio ",
        "Si, abbastanza, tanto da turbarmi	",
        "Un po' ",
        "Per nulla "
    ),array("12.	Nelle ultime 4 settimane, si è svegliato fresco e riposato? ",
        "Maì	",
        "Quasi mai "	,
        "Una parte del tempo	",
        "Molto tempo	",
        "Quasi sempre	",
        "Sempre	"
    ),array("13.	Nelle ultime 4 settimane, ha provato apprensione, preoccupazione o paura per la Sua salute? ",
        "Enormemente	",
        "Moltissimo	",
        "Parecchio	",
        "Un po', ma non tanto	",
        "Quasi mai	",
        "Per nulla	"
    ),array("14. Nelle ultime 4 settimane, ha avuto qualche motivo per domandarsi se stesse perdendo la ragione o se stesse perdendo il controllo della memoria, del modo in cui agisce, parla, pensa o sente? ",
        "No, per niente	",
        "Solo un po'	",
        "Qualche motivo, ma non sufficiente a causarmi apprensione o preoccupazione	",
        "Qualche motivo, tanto da causarmi un po' di preoccupazione	",
        "Qualche motivo, tanto da causarmi molta preoccupazione	",
        "Si, molti motivi e sono molto preoccupato	"
    ),array("15. Nelle ultime 4 settimane, la sua vita quotidiana è stata interessante per Lei? ",
        "Mai ",
        "Quasi mai ",
        "Una parte del tempo ",
        "Molto tempo ",
        "Quasi sempre ",
        "Sempre "
    ),array("16.	Nelle ultime 4 settimane, si è sentito attivo, in forze o lento, pigro?  ",
        "Sempre molto attivo e in forze ",
        "Quasi sempre attivo e in forze - mai veramente lento e pigro ",
        "Abbastanza attivo e in forze - raramente lento e pigro  ",
        "Abbastanza lento e pigro - raramente attivo e in forze ",
        "Quasi sempre lento e pigro - mai veramente attivo e in forze ",
        "Sempre molto lento e pigro "
    ),array("17.	Nelle ultime 4 settimane, è stato in ansia, preoccupato o arrabbiato?  ",
        "Enormemente, tanto da sentirmi male o quasi ",
        "Moltissimo ",
        "Parecchio ",
        "Abbastanza - tanto da turbarmi ",
        "Un po' ",
        "Per nulla "
    ),array("18.	Nelle ultime 4 settimane, si è sentito emotivamente stabile e sicuro di se stesso? ",
        "Mai	",
        "Quasi mai	",
        "Una parte del tempo	",
        "Molto tempo ",
        "Quasi sempre	",
        "Sempre	"
    ),array("19.	Nelle ultime 4 settimane, si è sentito rilassato, tranquillo oppure si è sentito molto teso, nervoso o agitato? ",
        "Sempre rilassato e tranquillo ",
        "Quasi sempre rilassato e tranquillo ",
        "Generalmente rilassato e tranquillo, ma qualche volta abbastanza teso	",
        "Generalmente molto teso, ma qualche volta abbastanza rilassato	",
        "Quasi sempre molto teso, nervoso, o agitato	",
        "Sempre molto teso, nervoso, o agitato "
    ),array("20.	Nelle ultime 4 settimane, si è sentito allegro e sereno? ",
        "Mai	",
        "Quasi mai ",
        "Una parte del tempo	 ",
        "Molto tempo	",
        "Quasi sempre	",
        "Sempre	"
    ),array("21.	Nelle ultime 4 settimane, si è sentito stanco, esaurito, logorato o sfinito? ",
        "Mai	",
        "Quasi mai "	,
        "Una parte del tempo ",
        "Molto tempo ",
        "Quasi sempre "	,
        "Sempre "
    ),array("22.	Nelle ultime 4 settimane, è stato o si è sentito sottoposto a stress o pressioni? ",
        "Si, quasi più di quanto potessi sopportare o reggere ",
        "Si, molto ",
        "5i, abbastanza - più del solito ",
        "Si, abbastanza - ma quasi come al solito ",
        "Si, un po'  ",
        "Per nulla "
    )
);
?>
<html><head>

<title>PGWBI</title>
<?php require 'StylePGWBI.php'; ?>
</head>
<body>
		<h1>PGWBI</h1>
		<div class="col-9 consegna">
		Questo questionario si propone di verificare il Suo stato attuale di benessere ponendole alcune domande su "come si sente" e su`corne Le stanno andando le cose in generale.
		Dopo aver letto attentamente tutte le possibili risposte, scelga per ciascuna domanda una sola risposta, quella che Le sembra descrivere meglio la Sua situazione.
		</div>
		<div class="row">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<?php 
for ($i = 0; $i < 22; $i++) {
    echo '<div class="col-12 tenda">
                <div class="roi">
                   <b> '.$pgwbi[$i][0].'</b>
                 </div>
                  <div class="col-12">';
   /* echo $pgwbi[$i];*/
    $value=0;
    foreach ($pgwbi[$i] as $chiave => $testo){
       /* echo $value.'volta scrive'.$testo.'<br>';*/    
    
        if ($testo==$pgwbi[$i][0])  {
            $cestino=13;
        }else {
            echo '
                   <div class="col-12">
                            <label class="contenitore" id="'.$i.$testo.'">
                                           
                                    <input  name="pgwbi['.$i.']" type="radio" id="'.$i.$testo.'" value="'.$value.'" '.$controllo.' />
                                    <span class="buttondo" id="'.$i.$testo.'" ></span>
                                    '.$testo.'
                                
                                    
                                
                            </label>
                        </div>';
            $value++ ;
            }
        /*echo 'Questa è la '.$value.' volta. Il testo è:  '.$testo;*/
       
        
    }echo '        </div>
          </div>';
}

?><br>
<p><input type="submit" value="Invia"/></p>
</form>
<div class="col-12">


</div>
</body>
</html>
