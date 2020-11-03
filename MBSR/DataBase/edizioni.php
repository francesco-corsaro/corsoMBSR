<?php
function clean_up ($data) {
    $data = htmlspecialchars($data);
    $data= trim($data);
    $data = stripslashes($data);
    
    return $data;
}


$courseName = clean_up( $_POST['courseName']); //this goes i

$dayBegin= clean_up ($_POST['gg']);
$monthBegin = clean_up ($_POST['month']);
$yearBegin = clean_up ($_POST['year']);

$dayEnd= clean_up ($_POST['ggEnd']);
$monthEnd = clean_up ($_POST['monthEnd']);
$yearEnd = clean_up ($_POST['yearEnd']);

function check_date($day,$month, $year) {
    if ($day>0 && $day<31) {
        $date=$day;
    } else {
        die('val not correct day');
    }
    
    if ($month>0 && $month<12) {
        $date=$month."-".$date;
    } else {
        die('val not correct month');
    }
    
    if ($year>2019 && $year <2025) {
        $date=$year."-".$date;
    } else {
        die('val not correct year');
    }
    
    return $date;
    
}
$dateBegin = check_date($dayBegin,$monthBegin,$yearBegin);
$dateEnd = check_date($dayEnd,$monthEnd,$yearEnd);




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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO Edizioni (inizio, fine, nome) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $dateBegin, $dateEnd, $courseName);

$stmt->execute();

$stmt->close();
$conn->close();

$success= '
<div class="alert alert-success">
  <strong>Success!</strong> Impostato nuovo corso: '.$courseName.' . Inizio: '.$dateBegin.' . Fine: '.$dateEnd.' .
</div>';
;
?>