<?php
session_start();
require 'backend/DataBase/SelezionaId.php';

if (!empty(htmlspecialchars($_POST[email]))) {
    
   //programma per accedere
    require 'backend/Accesso.php';
}
if ($_POST['out']==1) {
    $_SESSION['bypass']=0;
}
?>

<html>
    <head>
    	<title>Login</title>
    	
    	<?php require 'FrontEnd/Css/login/Style.php'; ?>
        <script> // con questo script si mostra la password -->
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
         </script>
    </head>

	<body>
		<h1>Corso MBSR</h1>
		
		<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<?php //questo è un messagfgio che compare quando l'utente non inserisce correttamente o quando l'utente non è registrato
		if ($_SESSION['denied']== 1) {
		    echo "<div>Nome utentente o password non corretto</div>";
		    $_SESSION['denied']= 0;
		}
		
		
		?>
		<div class="col-9 tenda">
    				<div class="titolo">Login</div>
    					<div class="col-11">
    						<div class="roi"><?php echo $meccanico;?> <?php if ($_SESSION['cambiopwd']==1) {echo '<div>Password modificata</div>';} ?>
    							Inserisci Username e password
    						</div>
        				</div>
        				
                    		<div class="col-6">	
                    			<?php echo $emailErr;$emailErr=''; echo "<div style=\"color:red\">". $_SESSION['emailDoble']."</div>";$_SESSION['emailDoble']="";?>
                    			<input name="email" type="TEXT" placeholder="Username" oninput=validateForm() required>
                    		</div>
                    		<div class="col-12">
                        		<div class="col-6">
                        			<input name="pwd" type="password"  maxlength="8" id="myInput" placeholder="Password" required  >
                        		</div>
                        		<div class=" consegna">
                        			<input type="checkbox" onclick="myFunction()">Mostra Password
                        		</div>
                			</div>
                			<div class="col-12">
                    		<input type="submit" id="myBtn" value="Accedi" disabled/>
                    		<script >
                    		function validateForm() {
                    			  var x = document.forms["myForm"]["email"].value; //da notare come vengono chiamati i valori del form
                    		      var y = document.forms["myForm"]["pwd"].value; //da notare come vengono chiamati i valori del form
                    		  if (x == "" && y == "" ) {
                    		    document.getElementById("myBtn").disabled=true; //il bottone deve essere impostato su disabilita

                    		  }else{
                    		  document.getElementById("myBtn").disabled=false;
                    		  }
                    		}
                    		</script>
                    	</div>
                			<div class="col-12 roi">
                				<a href="/MBSR/NewPwd.php" >Hai dimenticato la password? Clicca qui</a>
                			</div>
						
                    	<div class="col-12 roi">
                    		Oppure <b><a href="/MBSR/Registrazione.php">Registrati</a></b>
                    	</div>
		</div>
		</form>
	</body>
</html>