<?php
session_start();
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location: /MBSR/Login.php") ;
}
//Creo dei permessi per bypassare il required $_POST['stay2']
if ($_SESSION['name']!= 'kalimero') {
    $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['stay2'])){
    echo 'isset vero';
    
    //Mando alla pagina successiva
    header("location:  /MBSR/End.php") ;
}

if (array_key_exists("19",$_POST['stay2'])) {
    //test SAty-forma2
    $_SESSION['stay2']=array();
    array_push($_SESSION['stay2'],$_POST['stay2']);
    
    //Mando alla pagina successiva
    header("location: /MBSR/End.php") ;
}

$stay2=array(
    "1. Mi sento bene ",
"2. Mi sento teso e irrequieto ",
"3. Sono soddisfatto di me stesso ",
"4. Vorrei poter essere felice come sembrano esserlo altri ",
"5. Mi sento un fallito ",
"6. Mi sento riposato ",
"7. lo sono calmo, tranquillo e padrone di me ",
"8. Sento che le difficoltà si accumulano tanto da non poterle superare ",
"9. Mi preoccupo troppo di cose che in realtà non hanno importanza ",
"10. Sono felice ",
"11. Mi vengono pensieri negativi ",
"12. Manco di fiducia in me stesso ",
"13. Mi sento sicuro ",
"14. Prendo decisioni facilmente ",
"15. Mi sento inadeguato ",
"16. Sono contento ",
"17. Pensieri di scarsa importanza mi passano per la mente e mi infastidiscono ",
"18. Vivo le delusioni con tanta partecipazione da non poter togliermele dalla testa ",
"19. Sono una persona costante ",
"20. Divento teso e turbato quando penso alle mie attuali preoccupazioni "
);
$risposte=array('Per nulla','Poco','Abbastanza','Molto','Moltissimo');

?>
<html>
	<head>

		<title>STAY</title>
		
		<?php require 'StyleMSP.php'; ?>
	</head>
	<body>
		
		<h1>STAY</h1>
		
		<div class="col-9 consegna">
			Sono qui di seguito riportate alcune frasi che le persone spesso usano per descriversi. Legga ciascuna frase e poi contrassegni con una crocetta la casella che indica come <b><em>lei abitualmente si sente.</em></b> Non ci sono risposte giuste o sbagliate. Non impieghi troppo tempo per rispondere alle domande e dia la risposta che le sembra descrivere meglio come <b><em>lei abitualmente si sente.</em></b>
		</div>
		
		<div class="row">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
				
				<?php 
    				foreach ($stay2 as $chiave => $domanda) {
    				    echo '<div class="col-12 tenda">
                                <div class="roi">
                                    <b> '.$domanda.'</b>
                                </div>
                                <div class="col-12">';
				    $value=0;
				      foreach ($risposte as $risposta) {
				        echo ' <div class="col-12">
				                    <label class="contenitore" id="'.$risposta.'">
				      
				                        <input  name="stay2['.$chiave.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.' />
				                        <span class="buttondo" id="'.$risposta.'" ></span>
				                        '.$risposta.'
                                    </label>
                                </div>';
                        $value++ ;;
				  } echo '  </div>
                          </div>';   
				}
				?>
					<br>
					<p><input type="submit" value="Invia"/></p>
			</form>
		</div>
	</body>
</html>
		
		
		
		