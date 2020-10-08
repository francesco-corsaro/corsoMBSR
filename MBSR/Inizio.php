<?php
session_start();

?>
<html>
<head>

<title>MindfulTest</title>

<?php require 'Style.php'; ?>
	</head>
	<body>
		
		<h1>MindfulTest</h1>
		
		<div class="col-9 tenda">
    		<form action="/MBSR/FFMQ.php" method="post"  >
    			<div class="col-9 color">
    				Inserisci Il tuo nome per iniziare il test
    				<?php echo $_SESSION['nameErr'];
    				      unset($_SESSION['nameErr']); ?>
    			</div>
    			<input type="text" name="Name" placeholder="Nome" required>
    			<br>
    			<p><input type="submit" value="Invia"/></p>
    		</form>
		</div>
	
	</body>
</html>


















