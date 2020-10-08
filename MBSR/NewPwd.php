<?php session_start();
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[email])){
test_input_email($_POST[email]);
test_input_nome($_POST[nome]);
//test_input_cognome($_POST[cognome]);
test_input_pwd($_POST[pwd1], $_POST[pwd2]);
test_input_info( $_POST[eta], 18, 99);
//test_input_info($_POST[peso], 30, 150);
//test_input_info($_POST[altezza], 110, 250); ;

require 'backend/DataBase/CambiaPwd.php';
// if (!empty($_POST[email])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0) {
    if ($emailStat==1 && $pwdStat && $infoStato!=0){
 
        cambia_pwd(Anagrafica,Password,$hash,Email,$email,Nome,$_POST[nome],Eta,$_POST[eta]);
    $_SESSION['cambiopwd']=1;
    header("location: /MBSR/Login.php");
 }
}
?>
<html>
    <head>
    	<title>Modifica Password </title>
    	
    	
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
              }
            }
         </script>
        
         
    </head>

	<body>
		<h1>Ricerca MindFulness</h1>
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
    			
    			<div class="col-9 tenda">
    				
    					<div class="col-11">
    						<div class="roi">
    							Inserisci i tuoi dati e la nuova password <?php echo $mexpwd;?>
    						</div>
        				</div>
                		<div class="col-6">	
                		  <?php echo $emailErr;$emailErr='';?>
                		  <input name="email" type="TEXT" placeholder="Email" required>
                			
            			   <?php echo $infoErr;$infoErr='';?>	
                    	  <input name="nome" type="TEXT"   placeholder="Nome" maxlength="16" required >
     
                   		  <input name="eta" type="TEXT"   placeholder="Eta" maxlength="3" required >
                    	</div>
                    	<?php echo $pwdErr;?>
                			<div class="col-12">	
                				<div class="col-7">
                				
                					<input name="pwd1" type="password"  maxlength="8" id="myInput" placeholder="Inserire Password" required  >
                				</div>
                				
                			</div>
                				
                			<div class="col-12">
                				<div class="col-7">
                					<input name="pwd2" type="password"  oninput="compare_pwd()" maxlength="8" id="myInput1" placeholder="Conferma Password" required  >
                				</div>
                				<div class=" consegna">
                					<input type="checkbox" onclick="myFunction1()">Mostra Password
                				</div>
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
                    		<input type="submit" value="Invia"/>
                    	</div>
            
            </div>
            
    		</form>
    	
	</body>
</html>