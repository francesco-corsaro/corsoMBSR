<?php
$stop=0;
require 'ConnectDataBase.php';

$sql = "SELECT 	codice FROM Edizioni ORDER BY codice DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($stop==1) {
            break;
        }
        $edition=$row["codice"];
        $stop ++;
    }
} else {
    echo "0 results";
}
$conn->close();

?>