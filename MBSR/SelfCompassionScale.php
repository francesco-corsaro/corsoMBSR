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
if ($_SESSION['name']== 'kalimero' && isset( $_POST['compassion'])){
    echo 'isset vero';
    
    //Mando alla pagina successiva
    header("location:  /MBSR/End.php") ;
}

if (array_key_exists("25",$_POST['compassion'])) {
    //test SAty-forma2
    $_SESSION['compassion']=array();
    array_push($_SESSION['compassion'],$_POST['compassion']);
    
    //Mando alla pagina successiva
    header("location: /MBSR//endPage.php") ;
}

$compassion=array(
    "1. Disapprovo e sono severo/a nei confronti dei miei difetti e delle mie inadeguatezze. ",
    "2.	Quando mi sento giù tendo a ossessionarmi e fissarmi su tutto ciò che non va.",
    "3.	Quando le cose mi vanno male, vedo le difficoltà come una parte della vita con cui tutti fanno i conti.",
    "4.	Quando penso alle mie inadeguatezze, tendo a sentirmi più separato/a e tagliato/a fuori dal resto del mondo.",
    "5.	Quando soffro a livello emotivo cerco di essere amorevole verso me stesso/a.",
    "6.	Quando fallisco in qualcosa di importante per me, mi sento logorato/a dal senso di inadeguatezza.",
    "7.	Quando mi sento veramente giù, ricordo a me stesso/a che ci sono molte altre persone al mondo che si sentono come me.",
    "8.	Quando attraverso momenti veramente difficili, tendo ad essere duro/a con me stesso/a.",
    "9.	Quando qualcosa mi turba, cerco di mantenere un equilibrio emotivo.",
    "10. Quando per qualche motivo mi sento inadeguato/a, cerco di ricordarmi che la maggioranza delle persone prova sentimenti simili ai miei.",
    "11. Sono intollerante e impaziente verso gli aspetti del mio carattere che non mi piacciono.",
    "12. Quando attraverso periodi particolarmente difficili, dò a me stesso il supporto e l’affetto di cui ho bisogno.",
    "13. Quando mi sento giù, tendo a pensare che quasi tutte le altre persone sono probabilmente più felici di me.",
    "14. Quando accade qualcosa che mi fa stare male cerco di aver un punto di vista equilibrato della situazione.",
    "15. Cerco di considerare i miei difetti come parte della condizione umana.",
    "16. Quando vedo aspetti di me che non mi piacciono mi accanisco contro me stesso/a.",
    "17. Quando fallisco in qualcosa importante per me cerco di mantenereuna giusta prospettiva della situazione. ",
    "18. Quando sono molto in difficoltà, tendo a pensare che gli altri se la stanno passando meglio di me. ",
    "19. Quando soffro sono gentile con me stesso/a.",
    "20. Quando qualcosa mi fa stare male tendo a farmi trascinare dall’onda delle mie emozioni.",
    "21. Tendo ad essere freddo/a con me stesso/a quando soffro. ",
    "22. Quando mi sento giù, cerco di guardare alle miei emozioni con curiosità e apertura mentale.",
    "23. Sono tollerante nei confronti dei miei difetti e delle mie inadeguatezze.",
    "24. Quando succede qualcosa che mi fa stare male tendo ad ingigantire l’evento a dismisura.",
    "25. Quando fallisco in qualcosa di importante per me, tendo a sentirmi solo/a nel mio fallimento.",
    "26. Cerco di essere comprensivo e paziente verso quegli aspetti della mia personalità che non mi piacciono."
    
);
?>

<html>
<head>
<title>Scala della compassione di sé</title>
<?php include 'FrontEnd/Css/Range/Style.php';?>
    	
    	
    </head>
    <body>
		<h1>Scala della compassione di sé</h1>
		
    
    	<div class="istruzioni">
			
			<b>Istruzioni:</b> Legga attentamente ciascuna affermazione. Indichi quanto tende a comportarsi nel modo indicato, usando la seguente scala: 
			<div class="scala">
              <div class="punto">1<br>Quasi mai</div>
              <div class="punto">2</div>
              <div class="punto">3</div>
              <div class="punto">4</div>
              <div class="punto">5<br>Quasi sempre</div>
			</div>
			
		</div>
			
			<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
    			<div class="tenda vig">	
    				
    			<?php
    			foreach ($compassion as $chiave=>$testo){
    			    echo '<div class="consegna">
                        '.$testo.'
                      </div>
                      <div class="riga">';
    			    for ($i = 1; $i < 6; $i++) {
    			        echo'
                        <label class="container">'.$i.'
                          <input type="radio" name="compassion['.$chiave.']" id="compassion['.$chiave.']" value="'.$i.'" '.$controllo.'>
                          <span class="checkmark"></span>
                        
                        
                        </label>
                        ';
    			    }
    			    echo '</div>';
    			}
    			?>
    			<input type="submit" class="btn" id="myBtn" value="Invia"/>
    			</div>	
    		</form>