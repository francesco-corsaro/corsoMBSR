<?php
for ($i = 0; $i < 35; $i++) {
    

$sample=array();
$servername = "localhost";
$username = "mindfulquestionnaire";
$password ='' ;
$dbname = "my_mindfulquestionnaire";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $stato3= "Connesso";
}

$sql = "SELECT * FROM AnagraficaPSP WHERE Id='$i'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id=$row["Id"];
        $sample=[$row['data'],$id, $row['Email'], $row["Nome"], $row["Cognome"], $row['Genere'], $row['Eta'], $row['Password']] ;
    }
} else {
    echo "0 results";
}
$conn->close();


$servername = "localhost";
$username = "mindfulquestionnaire";
$password ='' ;
$dbname = "my_mindfulquestionnaire";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $stato3= "Connesso";
}

$sql = "INSERT INTO Anagrafica (Email,Id , Nome, Cognome, Genere, Eta, Password , professione, anni_esperienza,ex_corsista)
VALUES ('".$sample[2]."', '".$sample[1]."','".$sample[3]."', '".$sample[4]."', '".$sample[5]."', '".$sample[6]."', '".$sample[7]."', 'ND', '0' ,'0' )";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



echo '<br>';
}
?>

