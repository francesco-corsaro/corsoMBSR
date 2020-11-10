<?php
require 'backend/SicurezzaForm/SicurezzaForm.php';

test_input_email($_POST[email]);

pwd_match($_POST[pwd]);


require 'DataBase/ConnectDataBase.php';//serve a connettersi al database

$sql = "SELECT Email, Password, Id, Nome, Cognome, edizione, permesso FROM Anagrafica";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['Email'] == $email && password_verify($pasword, $row['Password'])) {
            
            $_SESSION['nickName']=$email;
            $_SESSION['codice']= $row["Id"];
            $_SESSION['edizione']= $row["edizione"];
            $_SESSION['cogn']=$row["Cognome"];
            $_SESSION['name']=$row["Nome"];
            $permesso=$row['permesso'];
            if ($permesso==3) {
                $_SESSION['bypass']='jhbfjJHBHjh8907jHKiUHUu';
               // $conn->close();
                header("location: /MBSR/ffmqAdmin.php");
            } else {
                $_SESSION['bypass']='b1p4ss';
                header("location: /MBSR/partecipaQuestionarioPage.php");
            }
            
            $conn->close();
            
            /* var_dump($row);*/
            $meccanico="<br>Login effettuato<br>";
            
        }else{
            $denied='<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Danger!</strong> Ops..! L\'indirizzo email o la password non sono validi. Riprova o conttata gli amministratori.
                      </div>';
            
        }
    }
    
}else {
    echo 'non gira il select';
}

  /*  }
} elseif ($result==FALSE){
    $_SESSION['denied']=1;
    
}
else {
    $_SESSION['denied']=1;
    
}*/
$conn->close();
/*$_SESSION['denied']=" 1 " ;
header("location: /Login/Frontend/LogForm.php");*/
?>


