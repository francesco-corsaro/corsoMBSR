<?php
session_start();
$volta='b1p4ss';
if ($_SESSION['bypass']==!$volta) {
    header("location: /MBSR/Login.php") ;
}
?>
<html>
	<head>

		<title>FineTest</title>
		
		<?php require 'Style.php'; ?>
	</head>
	<body>
		
		<h1>Corso MBSR</h1>
		
		<div class="col-9 consegna">
		<?php require 'DataBase/CaricaRisposte.php';
		?>
		</div>
		<div class="col-12 tenda">
			<a href="/MBSR/Login.php">Clicca qui per terminare il test</a>
		</div>
	</body>
</html>



