<?php
/*  la funzione prende dalla 
        1)tabella Anagrafica le colonne: data', 'id', 'nome', 'cognome', 'genere', 'eta';
        2) tabella target (es: 'Ffmq' o 'Msp') : 'id', 'Q1','Q2'...'Qn';
    
    Tra le tabelle Anagrafica e quelle target vi è una relazione con la colonna id. Nella tabella anagrafica la colonna 'id' è una chiave primaria,
    mentre nelle tabelle target la colonna 'id' è una chiave esterna in relazine con Anagrafica
    
    LA FUNZIONE DEVE RITORNARE UN ARRAY  ASSOCIATIVO COSÌ COMPOSTO:
        $campione={id:{'id': value_id, 'nome': value_nome, 'cognome': value_cognome, 'genere': value_genere, 'periodo': value_periodo, 'data' : value_data, 'q1':value_q1 ,... 'q34': value_q34}}
    
    HINT:
        mODIFICARE la seguente query sql per prendere i dati dalle tabelle
        SELECT Ffmq.Id, Anagrafica.Email, Ffmq.Name, Anagrafica.Cognome, Anagrafica.Genere, Anagrafica.Eta, Edizioni.nome, Ffmq.*, Msp.*, Pgwbi.*, Compassion.* FROM Anagrafica INNER JOIN Ffmq ON Anagrafica.Id = Ffmq.id INNER JOIN Msp ON Anagrafica.Id = Msp.Id INNER JOIN Pgwbi ON Anagrafica.Id = Pgwbi.Id INNER JOIN Compassion ON Anagrafica.Id = Compassion.id INNER JOIN Edizioni ON Anagrafica.edizione = Edizioni.codice

        
    */

    function prendi_partecipanti_tot($tabel1,$tabel2, $tabel3, $tabel4,$tabel5){
        $campione=[];

        // Micconnetto al database
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
        
        //mando la query
        $sql = "SELECT ".$tabel1.".Id, Anagrafica.Email, Anagrafica.Nome, Anagrafica.Cognome, Anagrafica.Genere, Anagrafica.Eta, ".$tabel5.".nome, ".$tabel1.".*, ".$tabel2.".*, ".$tabel3.".*, ".$tabel4.".*\n"
            . "FROM Anagrafica \n"
            . "INNER JOIN ".$tabel1." ON Anagrafica.Id = ".$tabel1.".id\n"
            . "INNER JOIN ".$tabel2." ON Anagrafica.Id = ".$tabel2.".Id\n"
            . "INNER JOIN ".$tabel3." ON Anagrafica.Id = ".$tabel3.".Id\n"
            . "INNER JOIN ".$tabel4." ON Anagrafica.Id = ".$tabel4.".id\n"
            . "INNER JOIN Edizioni ON Anagrafica.edizione = Edizioni.codice";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              foreach ($row as $key => $value) {
                  if ($key != 'Name' && $key != 'data' && $key != 'Data' && $key != 'incr' && $key != 'Progressivo' && $key != 'Increment') {
                      $campione[$row['Id']][$key]=$value;
                    }
                }
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        
        return $campione;
        
    }
    /*
    $ffmqPre=prendi_partecipanti('Ffmq');
    $mspPre=prendi_partecipanti('Msp');
    $PostCompassion= prendi_partecipanti('PostCompassion');
    */
    function create_table_tot($tabel,$tabel2){

        
        echo'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">'
                .'<thead>'
                    .'<tr>';
        foreach ($tabel as $key => $value) {
            foreach ($tabel[$key] as $key1 => $value1) {
                echo    '<th>'.$key1,'</th>';
            }
            break;
        }
        echo        '</tr>
                </thead>';
        echo    '<tfoot>'
                    .'<tr>';
            foreach ($tabel as $key => $value) {
                foreach ($tabel[$key] as $key1 => $value1) {
                   echo    '<th>'.$key1,'</th>';
                }
                break;
            }
        echo        '</tr>
                </tfoot>
                <tbody>';
            

        foreach ($tabel as $key => $value) {
            echo '<tr class="hov">';
            foreach ($tabel[$key] as $key1 => $value1) {
                if ($key=='Nome' || $key== 'Cognome') {
                    echo '<td>'.ucfirst($value1).'</td>';
                }else{
                    echo '<td>'.$value1.'</td>';
                }
            }
            echo '</tr>';
        }
        foreach ($tabel2 as $key => $value) {
            echo '<tr class="hov">';
            foreach ($tabel2[$key] as $key1 => $value1) {
                if ($key=='Nome' || $key== 'Cognome') {
                    echo '<td>'.ucfirst($value1).'</td>';
                }else{
                    echo '<td>'.$value1.'</td>';
                }
            }
            echo '</tr>';
        }
        echo'   </tbody>
            </table>';
    }

    function mostra_punteggi_grezzi_tot($tabel1,$tabel2, $tabel3, $tabel4, $tabel5,$tabel6, $tabel7, $tabel8, $tabelEdi)
    {
        create_table_tot(prendi_partecipanti_tot($tabel1,$tabel2, $tabel3, $tabel4, $tabelEdi),prendi_partecipanti_tot($tabel5,$tabel6, $tabel7, $tabel8, $tabelEdi));
    }

    //mostra_punteggi_grezzi('Compassion');
    //0create_table(prendi_partecipanti('Pgwbi'));
    //var_dump($ffmqPre);
