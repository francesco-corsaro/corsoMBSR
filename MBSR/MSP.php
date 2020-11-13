<?php
session_start();
//Creo dei permessi per bypassare il reuired $_POST['msp']
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location:  https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php") ;
}
if ($_SESSION['name']!= 'kalimero') {
    $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['msp'])){
    echo 'isset vero';
    
    //Mando alla pagina successiva
    header("location:  /MBSR/SelfCompassionScale.php") ;
}

if (array_key_exists("48",$_POST['msp'])) {
    /* TEST MSP*/
    $_SESSION['msp']=array();
    array_push($_SESSION['msp'],$_POST['msp']);
    //Mando alla pagina successiva
    header("location: /MBSR/SelfCompassionScale.php") ;
}


$msp=array(
    "1. Sento di stare in continua tensione",
    "2. Mi sento la gola stretta o la bocca secca",
    "3. Sento la pressione del tempo, mi manca il tempo",
    "4. Tendo a saltare i pasti o a dimenticare di mangiare",
"5. Riesamino le stesse idee più volte, rimugino, ho gli stessi pensieri che si ripetono, sento la testa piena di pensieri",
"6. Provo un senso di isolamento e incomprensione",
"7. Mi sento sopraffatto/a, sovraccaricato/a",
"8. Mi preoccupo di ciò che può succedere il giorno dopo",
"9. Ho il viso (fronte, sopracciglia o labbra) contratto, corrugato",
"10. Presto continuamente attenzione all'orario, guardo spesso il mio orologio o chiedo l'ora",
"11. Sono irritabile, ho i nervi a fior di pelle, perdo la pazienza con le persone e le cose",
"12. Ho difficoltà a digerire, mal di stomaco, mi sento un nodo allo stomaco",
"13. Sento scoraggiamento e senso di abbattimento",
"14. Ho dei dolori fisici: mal di schiena, mal di testa, male al collo, mal di pancia",
"15. Sento preoccupazione o fastidio",
"16. Ho improvvise variazioni della temperatura corporea (molto caldo o molto freddo)",
"17. Mi mangio le unghie o la pelle intorno alle dita, o mi mordo le labbra e l'interno delle guance",
"18. Dimentico appuntamenti, oggetti o cose da fare",
"19. Piango facilmente",
"20. Sono affaticato/affaticata",
"21. Ho le mascelle serrate",
"22. Riesco a mantenere la calma",
'23. Ho le mani sudate o sudo molto (le ascelle, i piedi, ecc",")',
"24. Vedo la vita semplice e facile",
"25. Mi sento il cuore che batte velocemente o irregolarmente",
"26. Cammino velocemente",
"27. Faccio lunghi sospiri o riprendo di colpo la respirazione",
"28. Ho diarrea o crampi intestinali o stitichezza",
"29. Provo inquietudine o angoscia",
"30. Ho soprassalti per situazioni inattese o rumori improvvisi",
"31. Impiego più di mezz'ora per addormentarmi",
"32. Ho comportamenti bruschi, mi muovo rapidamente e a scatti",
"33. Provo una sensazione di inefficienza, inadeguatezza",
"34. Ho i muscoli tesi o che tremano, ho crampi",
"35. Ho l'impressione di perdere il controllo",
"36. Ho scatti di aggressività",
"37. Provo confusione, non ho le idee chiare, manco di attenzione e di concentrazione",
"38. Ho i lineamenti tirati o le occhiaie",
"39. Evito i contatti sociali o non frequento più attività culturali, non ho più hobbies, non esco, mi isolo",
"40. Ho il respiro corto, a scatti, limitato, rapido",
"41. Sento un gran peso sulle spalle" ,
"42. Ho l'impressione che ogni cosa mi comporti uno sforzo notevole",
"43. Ho molta energia, mi sento in forma",
"44. Provo irrequietezza, ho sempre bisogno di muovermi, non riesco a stare fermo",
"45. Mangio velocemente, finisco di pranzare in meno di 15 minuti",
"46. Controllo male le mie reazioni, l'umore, i gesti",
"47. Sono stressato /stressata",
"48. Faccio gaffes, inciampo, perdo le cose, ho incidenti di vario tipo",
"49. Riesco a rilassarmi");

$risposte=array('Per nulla','Poco','Abbastanza','Molto');
?>
<html>
	<head>

		<title>MSP</title>
		
		<?php require 'StyleMSP.php'; ?>
	</head>
	<body>
		
		<h1>MSP</h1>
		
		<div class="col-9 consegna">	
			E' qui di seguito riportata una lista di affermazioni che possono essere più o meno vere per lei. Dopo aver letto ciascuna frase, contrassegni la risposta che indica il grado in cui l'affermazione le sembra descrivere meglio la sua situazione recente, vale a dire <em>negli ultimi quattro o cinque giorni</em>:
		</div>
		
		
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
				
				<?php
				foreach ($msp as $chiave => $domanda) {
				    echo '<div class="row"><div class="col-12 tenda">
                                <div class="roi">
                                    <b> '.$domanda.'</b>
                                </div>
                                <div class="col-12">';
				    $value=0;
				    foreach ($risposte as $risposta) {
				        echo ' <div class="col-12">
				                    <label class="contenitore" id="'.$risposta.'  ">

				                        <input  name="msp['.$chiave.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.'/>
				                        <span class="buttondo" id="'.$risposta.'" ></span>
				                        '.$risposta.'
                                    </label>
                                </div>';
				        $value++ ;
				    } echo '  </div>
                          </div></div>';
				}
				?>
					<br>
					<p><input type="submit" value="Invia"/></p>
			</form>
		
	</body>
</html>
				
				
				
				
				
				
				
				