<?php
function mv_other_table($table_one,$position,$table_two) {
    require 'ConnectDataBase.php';
    $arr=array();
    $sql = "SELECT * FROM ".$table_one." WHERE Id=".$position."";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $arr= $row;
        }
    } else {
        echo "0 results";
    }
    //echo "Error updating record: " . $conn->error.'<br>';
    mysqli_close($conn);
    
    
    foreach ($arr as $key => $value) {
        //echo 'Key= '.$key.' value= '.$value.'<br>';
        
            $column .=$key.', ';
            $values .= "'".$value."', ";
        
        
    }
    
    //toglie l'ultima virgola
    $column= substr($column,0,strrpos($column,','));
    $values= substr($values,0,strrpos($values,','));
    
    
    
    
    require 'ConnectDataBase.php';
    
    $sql = "INSERT INTO ".$table_two." (".$column.") VALUES (".$values.")";
    
    if ($conn->query($sql) === TRUE) {
        $move=true;
    } else {
        //echo "<br>Error: " . $sql . "<br>" . $conn->error;
        $move=false;
    }
    
    $conn->close();
    
    //delete partecipant from the table
    
    if ($move==true) {
        require 'ConnectDataBase.php';
        $sql = "DELETE FROM ".$table_one." WHERE Id=".$position."";
        
        if ($conn->query($sql) === TRUE) {
            $delete='ok';
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        
        $conn->close();
    }else {
        $delete= 'Delete problem';
    }
    
    return $delete;
    
};

function mv_partecipant($id) {
    

    $anagrafica= mv_other_table('Anagrafica',$id,'DropAnagrafica');
    $ffmq= mv_other_table('Ffmq',$id,'DropFfmq');
    $pgvbi= mv_other_table('Pgwbi',$id,'DropPgwbi');
    $msp= mv_other_table('Msp',$id,'DropMsp');
    $compassion= mv_other_table('Compassion',$id,'DropCompassion');
    if ($anagrafica=='ok' && $ffmq=='ok' && $pgvbi=='ok' && $msp=='ok' && $compassion=='ok' ) {
        $checkDelete='<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-check"></i> OK!</strong> Partecipante eliminato correttamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }else {
        $checkDelete='<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><i class="fas fa-exclamation"></i>Ops!</strong> Si qualcosa è andato storto 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    
    return $checkDelete;
}













