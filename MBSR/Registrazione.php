<?php session_start();
// Pulizia dati input
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[nome])){
    test_input_email($_POST[email]);
    test_input_nome($_POST[nome]);
    test_input_cognome($_POST[cognome]);
    test_input_pwd($_POST[pwd1], $_POST[pwd2]);
    test_input_info( $_POST[eta], 18, 99);
    
    
    
}

// Verifica se il contatto email è già stato inserito e Inserisce dati puliti nel database
require 'backend/DataBase/InsertRegistrazione.php';
if (!empty($_POST[nome])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0) {
    
    require 'DataBase/VerificaDoppi.php'; //chiama la seguente funzione
    check_doble ('Anagrafica', 'Email', $email); 
    
    if ($checkDoble===1) {
        $_SESSION['emailDoble']="Username  gia registrato nel database.";
        header("location: /MBSR/Login.php");
    }else {
        Inserisci_id(Anagrafica, $email, $nome, $cognome, $_POST[genere], $_POST[eta], $hash);
        echo $stato;
        header("location: /MBSR/Login.php");
        
    }
    
 
 } 
  
?>
<html>
    <head>
    	<title>Corso MBSR </title>
    	
    	
        <?php require 'FrontEnd/Css/login/Style.php'; ?>
        
        <script> <!-- con questo script si mostra la password -->
            function myFunction1() {
              var x = document.getElementById("myInput");
              var y = document.getElementById("myInput1");
              if (x.type === "password") {
                x.type = "text";
                y.type = "text";
              } else {
                x.type = "password";
                y.type = "password";
              }
            }
         </script>
    </head>

	<body>
		<h1>Corso MBSR</h1>
		
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
    			
    			<div class="col-9 tenda">
    					<div class="titolo">Registrazione</div>
    					<div class="col-11">
    						<div class="roi">
    							Crea il tuo <em>account</em> per partecipare alla progetto
    						</div>
        				</div>
                		<div class="col-6">	
                				<?php echo $emailErr;$emailErr='';?>
                				<input name="email" type="TEXT" placeholder="Email" required>
                				<?php echo $nomeErr.$cognomeErr;$nomeErr=$cognomeErr='';?>
                				<input name="nome" type="TEXT" placeholder="Nome" required>
                			
            					<input name="cognome" type="TEXT" placeholder="Cognome" required>
								<div class="col-3 sezione">
        						  <?php echo $infoErr;$infoErr='';?>    	 
                    	 		  <input name="eta" type="TEXT" placeholder="Età" maxlength="2"required>
                    	       </div>
                    	       
                    	       <div class="col-10 consegna">
            				Genere:	<label class="contenitore" id="gen">
                						<input  name="genere" id="gen" type="radio" value="1" required/>
                						<span class="buttondo" id="gen" ></span>
                						M 
                					</label>
                					<label class="contenitore" id="gen2">	
                		   				<input  name="genere"id="gen2" type="radio" value="2" required />
                    		   			<span class="buttondo" id="gen2" ></span>
                    		   			F
                					</label>
                		</div>	
						</div>    
									
                		<div class="col-8">
                		<?php echo $pwdErr;?>
                				<div class="col-7">
                					<input name="pwd1" type="password"  maxlength="8" id="myInput" placeholder="Crea nuova password" required  >
                				</div>
                				
                				<div class="col-7">
                					<input name="pwd2" type="password"  oninput="compare_pwd()" maxlength="8" id="myInput1" placeholder="Conferma Password" required  >
                				</div>
                				<div class="col-3 consegna">
                					<input type="checkbox" onclick="myFunction1()">Mostra Password
                				</div>
                				<!-- Questo script manda un messaggio se le password non coincidono -->
                				<p id="mex_err"><p>
                				<script>
                        			function compare_pwd(){
                        				var pwd=document.getElementById("myInput").value;
                        				var	pwd1=document.getElementById("myInput1").value;
                        				if (pwd === pwd1){
                        					document.getElementById("mex_err").innerHTML=
                            				"Passwrord: ok!";
                        					document.getElementById("mex_err").style.color=
                            				'green';
                        				} else {
                        					document.getElementById("mex_err").innerHTML=
                                				"Le password non coincidono";
                        					document.getElementById("mex_err").style.color=
                                				'red';
                            				}
                        			}
                                 </script>
            			</div>
            			
                								
                    	<div class="col-12">
                    		<input type="submit" value="Registrati"/>
                    	</div>
            
            </div>
            
    		</form>
    	
	</body>
</html>