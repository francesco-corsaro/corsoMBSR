<?php
$pretest=array();
$pretest[14]='12-23-2222';
$pretest[34]='64-33-2212';

require 'ConnectDataBase.php';
$sql = "SELECT Id, Giorno FROM Ffmq";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $chiave=$row['Id'];
        $val=$row["Giorno"];
        $pretest[$chiave]=$val;
    }
}else {
    echo "0 results";
}
$conn->close();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">

table { width: 70%; background-color: #FFFFFF; color: #000000; border-color: #CCCCCC; border-collapse: collapse; }
th, td { width: 20%; border-color: #000000;}
</style>
</head>
<body>
<h1>Registro presenze pre-test</h1>
<table border="2" cellspacing="0" cellpadding="5px" align="center">
<thead>
<tr>
<th>Id</th>
<th>Nome</th>
<th>Cognome</th>
<th>Registrazione</th>
<th>Pre-Test</th>

</tr>
</thead>
<tbody>
<?php 
require 'ConnectDataBase.php';
$sql = "SELECT Id, Nome, Cognome, data FROM Anagrafica ORDER BY Cognome";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $identif=$row['Id'];
        if ($identif!=1) {
            
        
        echo "<tr>
                <td>".$row['Id']."</td>
                <td>".$row['Nome']."</td>
                <td>".$row['Cognome']."</td>
                <td>".$row['data']."</td>
                <td>".$pretest[$identif]."</td>
                
               </tr>";
        }
    }
}

?>
<tr>
                <td><b>TOT</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo (count($pretest)-2); ?></td>
                
</tr>
</tbody>
</table>
</body>
</html>