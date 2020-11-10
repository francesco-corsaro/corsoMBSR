<?php
function check_reg($tabel, $column, $target) {
    require 'ConnectDataBase.php';
    
    $sql = "SELECT * FROM ".$tabel." WHERE $column = '$target' ";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
       
        while($row = $result->fetch_assoc()){
            if ($row["$column"]==$target ){
                //in questo caso trova un doppio 
               
               
                return array(true); 
            }
        }
    }else {
        //Non ha trovato doppioni
        $result= '<div class="alert alert-warning alert-dismissible text-xs">Indirizzo email non presente nel database.<br> Inserisci nuovamente il tuo indirizzo altrimenti coontatta gli amministratori</div>' ;
        return array(false, $result) ; 
    }
    
    $conn->close();
}


/*
$collaudo=check_reg('Anagrafica', 'Email', 'agata.furneri@gmail.com');
if ($collaudo[0]==true) {
    echo 'è presente ';
} else {
    echo $collaudo[1];
}
*/
?>