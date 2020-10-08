<?php
session_start();
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location: /MBSR/Login.php") ;
}
//Creo dei permessi per bypassare il reuired $_POST['stay1']
if ($_SESSION['name']!= 'kalimero') {
    $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['stay1'])){
    echo 'isset vero';
    
    //Mando alla pagina successiva
    header("location:  /MBSR/STAY-forma2.php") ;
}

if (array_key_exists("19",$_POST['stay1'])) {
    //test Stay1
    $_SESSION['stay1']=array();
    array_push($_SESSION['stay1'],$_POST['stay1']);
    //Mando alla pagina successiva
    header("location: /MBSR/STAY-forma2.php") ;
}


$stay1=array(
    "1. Mi sento calmo",
    "2. Mi sento sicuro",
    "3. Sono teso",
    "4. Mi sento sotto pressione",
    "5. Mi sento tranquillo",
"6. Mi sento turbato",
"7. Sono attualmente preoccupato per possibili disgrazie",
    "8. Mi sento soddisfatto",
"9. Mi sento intimorito",
"10. Mi sento a mio agio",
"11. Mi sento sicuro di me",
"12. Mi sento nervoso",
"13. Sono agitato",
"14. Mi sento indeciso",
"15. Sono rilassato",
"16. Mi sento contento",
"17. Sono preoccupato",
"18. Mi sento confuso",
"19. Mi sento disteso",
"20. Mi sento bene"
);
$risposte=array('Per nulla','Poco','Abbastanza','Molto','Moltissimo');

?>
<html>
	<head>

		<title>STAY</title>
		
		<?php require 'StyleStay.php'; ?>
	</head>
	<body>
		
		<h1>STAY</h1>
		
		<div class="col-9 consegna">
		Sono qui di seguito riportate alcune frasi che le persone spesso usano per descriversi. Legga ciascuna frase e poi contrassegni con una crocetta la casella che indica come lei si sente <b><em>adesso, cioè in questo momento.</em></b> Non ci sono risposte giuste o sbagliate. Non impieghi troppo tempo per rispondere alle domande e dia la risposta che le sembra descrivere meglio i suoi attuali stati d'animo.
		</div>
		
		<div class="row">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
				
				<?php 
				foreach ($stay1 as $chiave => $domanda) {
				    echo '<div class="col-12 tenda">
                            <div class="roi">
                                <b> '.$domanda.'</b>
                            </div>
                            <div class="col-12">';
				    $value=0;
				      foreach ($risposte as $risposta) {
				        echo ' <div class="col-12">
				                    <label class="contenitore" id="'.$risposta.'">
				      
				                        <input  name="stay1['.$chiave.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.'/>
				                        <span class="buttondo" id="'.$risposta.'" ></span>
				                        '.$risposta.'
                                    </label>
                                </div>';
                        $value++ ;
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
		
		
		
		