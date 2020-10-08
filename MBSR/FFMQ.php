<?php
session_start();
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location: /MBSR/Login.php") ;
}
//prendo la variabile Nome
if (!preg_match("/^[a-zA-Z0-9 ]*$/",$_SESSION['Name'])) {
    $_SESSION['nameErr'] = '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
    header("location: /MBSR/Login.php");
}

//Creo dei permessi per bypassare il reuired
if ($_SESSION['name']!= 'kalimero') {
   $controllo='required' ;
}
if ($_SESSION['name']== 'kalimero' && isset( $_POST['ffmq'])){
    echo 'isset vero';
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}

//funzioni per caricare le risposte nell array
if (array_key_exists("38",$_POST['ffmq'])) {
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}


$ffmq=array(
1=> '1. Mentre cammino, sto attento/a alle sensazioni del mio corpo che si sta muovendo.',
2=> '2. Sono bravo/a a trovare le parole che descrivono i miei sentimenti.',
3=> '3.  Critico me stesso/a per avere emozioni irrazionali o inappropriate.',
4=> '4. Percepisco i miei sentimenti e le mie emozioni senza essere costretto/a a reagirvi.',
5=> '5. Quando faccio qualcosa la mia mente tende a vagare e mi distraggo facilmente.',
6=> '6. Quando faccio il bagno o la doccia, cerco di prestare attenzione alle sensazioni prodotte dall\'acqua sul mio corpo.',
7=> '7. Riesco facilmente a trovare le parole per esprimere le mie credenze, le mie opinioni e le mie aspettative.',
8=> '8. Non presto attenzione a quello che faccio, perché sogno ad occhi aperti, sono preoccupato/a o distratto/a.',
9=> '9. Osservo i miei pensieri senza perdermi in essi.',
10=> '10. Dico a me stesso/a che non dovrei sentirmi nel modo in cui mi sento.',
11=> '11. Mi accorgo di come i cibi e le bevande influenzano i miei pensieri, le mie sensazioni corporee e le mie emozioni.',
12=> '12.Per me è difficile trovare le parole per descrivere quello a cui sto pensando.',
13=> '13. Mi distraggo facilmente.',
14=> '14. Credo che alcuni dei miei pensieri siano anormali o cattivi e che non dovrei pensarla in questo modo.',
15=> '15. Presto attenzione alle sensazioni, come il vento nei capelli o il sole sul viso.',
16=> '16. Per me è un problema trovare le parole giuste per descrivere quello che penso.',
17=> '17. Tendo a giudicare i miei pensieri come buoni o come cattivi.',
18=> '18. Trovo difficile rimanere concentrato/a su quello che accade nel presente.',
19=> '19. Quando i miei pensieri mi turbano, faccio un passo indietro e sono consapevole del pensiero o dell\'immagine senza esserne sopraffatto/a.',
20=> '20. Presto attenzione ai nimori, come ad esempio al ticchettio dell\'orologio, al cinguettio degli uccelli o al passaggio delle macchine.',
21=> '21. Nelle situazioni diffidili riesco a fermarmi senza reagire immediatamente.',
22=> '22. Quando provo una sensazione sul mio corpo, mi risulta difficile descriverla perché non trovo le parole giuste.',
23=> '23. Mi sembra di funzionare in automatico senza troppa consapevolezza di quello che sto facendo.',
24=> '24. Quando i miei pensieri o immagini mi turbano, riesco a calmarmi in poco tempo.',
25=> '25. Dico a me stesso/a che non dovrei pensare nel modo in cui penso.',
26=> '26. Noto gli aromi e gli odori delle cose.',
27=> '27. Spesso quando sono sconvolto/a riesco a trovare il modo per esprimerlo a parole.',
28=> '28. Svolgo frettolosamente le mie attività senza prestarvi davvero attenzione.',
29=>'29. Quando i miei pensieri o immagini mi turbano, sono in grado di accorgermene senza reagire.',
30=> '30. Ritengo che alcune delle mie emozioni siano cattive o inappropriate e che non dovrei sentirle.',
31=> '31. Noto gli aspetti visivi nell\'arte e nella natura, come i colori, le forme, le trame o i giochi dí luci e ombre.',
32=> '32. La mia inclinazione naturale è quella di tradurre le mie esperienze in parole.',
33=> '33. Quando í miei pensieri e immagini mi turbano, li noto soltanto e li lascio andare.',
34=> '34. Svolgo dei lavori e dei compiti automaticamente senza essere consapevole di quello che sto facendo.',
35=> '35. Quando i miei pensieri o immagini mi turbano, giudico me stesso/a come buono/a o come cattivo/a, a seconda del contenuta del pensiero o dell\'immagine.',
36=> '36. Presto attenzione a come le mie emozioni influenzano i miei pensieri e il mio comportamento.',
37=> '37. Di solito sono capace di descrivere abbastanza dettagliatamente come mi sento in un dato momento.',
38=> '38. Mi trovo a fare cose senza prestarvi attenzione.',
39=> '39. Sono critico/a con me stesso/a quando mi vengono delle idee irrazionali.'
);
?>
<html><head>

<title>FFMQ</title>
<?php require 'Style.php'; ?>
</head>
<body>
	<h1>FFMQ </h1>
	<div class="col-9 consegna">
		 Risponda ai seguenti items, indicando per ognuno la risposta corrispondente alle parole che descrivono meglio la sua opinione o ciò che è più aderente al suo sentire.
			
	</div>
	
	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		
		<?php 

$chiave='1';
 foreach ($ffmq as $chiave=>$testo){
   
     echo  
        '<div class="col-12 tenda">
            <p class="color"><b>'.$testo.'</b></p>
            <label class="contenitore" ">
                Mai
                <input  name="ffmq['.$chiave.']" type="radio" value="1" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Raramente 
                <input  name="ffmq['.$chiave.']" type="radio" value="2" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Qualche volta
                <input name="ffmq['.$chiave.']" type="radio" value="3" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Spesso
                <input  name="ffmq['.$chiave.']" type="radio" value="4" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Molto Spesso
                <input  name="ffmq['.$chiave.']" type="radio" value="5" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            
          </div>';
    
 }
?>


    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	