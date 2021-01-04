<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

    $pretest=array();


require 'DataBase/ConnectDataBase.php';
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

$postest=array();


require 'DataBase/ConnectDataBase.php';
$sql = "SELECT Id, Giorno FROM PostFfmq";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $chiave=$row['Id'];
        $val=$row["Giorno"];
        $postest[$chiave]=$val;
    }
}else {
    echo "0 results";
}
$conn->close();



?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title>Corso  Mindfulness - Partecipa al questionario</title>
    <!-- Custom styles for this page -->
  <link href="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    .btnradius{
      width: 100%;
      border-radius: 35rem;
    }
    .hov{
      background-color: inherit;

    }
    .hov:hover{
      background-color: rgb(220,220,220,0.30);
    }
  </style>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- begin navbar -->
    <?php require "navbar.php" ;?>

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Corso mindfulness based stress reduction  </h1>
        <p class="mb-4">Benvenuto al corso MBSR, da questa pagina puoi visualizzare i partecipanti dei tuoi corsi</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
          <?php echo $checkDelete;?>
            <!-- here insert login form -->
            <div class="card shadow mb-4  border-bottom-info">
                  <!-- Card Header - Dropdown --><?php require 'DataBase/selectEdizioni.php'; ?>
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edizione: <?php echo ($edizioni[$edition][1] ? $edizioni[$edition][1] : 'Tutte le edizioni') ; echo ' '.$erroresql; ?></h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Edizioni:</div>
                                            <?php 
                                            foreach ($edizioni as $k => $value) {
                                                echo '<a class="dropdown-item" href="http://mindfulquestionnaire.altervista.org/MBSR/tablePage.php?edition='.$edizioni[$k][0].'">'.$edizioni[$k][1].'</a>';
                                            }
                                            ?>
                                            
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="http://mindfulquestionnaire.altervista.org/MBSR/tablePage.php">Mostra tutte</a>
                                        </div>
                                    </div>
                                </div>
                  <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="background-color:rgb(220,220,220,0.30); ">N°</th>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Registrazione</th>
                      <th>Edizione</th>
                      <th>Pre-Test</th>
                      <th>Post-Test</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th style="background-color:rgb(220,220,220,0.30);" >N°</th>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Registrazione</th>
                      <th>Edizione</th>
                      <th>Pre-Test</th>
                      <th>Post-Test</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $i=1;
                  
                  if($edition!=""){$where="WHERE edizione='$edition'";}
require 'DataBase/ConnectDataBase.php';
$sql = "SELECT Id, Nome, Cognome, edizione, data FROM Anagrafica $where ORDER BY Cognome";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $identif=$row['Id'];
        $surname=$row['Cognome'];
        //($identif!=='30' || $identif!=='31' || $identif!=='1')
        if ($surname!= 'utente' && $surname!= 'cambiopwd' && $surname!= 'demo'  ) {
            
        
        echo "<tr class=\"hov\" >
        <td style=\"background-color:rgb(220,220,220,0.30); \"  >".$i." <button type=\"button\"  class=\"btn\" data-toggle=\"modal\" data-target=\"#DeleteModal\" data-whatever=\"".$identif."\" data-cog=\"".ucfirst($row['Cognome'])."\" data-name=\"".ucfirst($row['Nome'])."\"><i class=\"fas fa-trash-alt\"></i></button></td>
                <td>".ucfirst($row['Nome'])."</td>
                <td>".ucfirst($row['Cognome'])."</td>
                <td>".$row['data']."</td>
                <td>".$row['edizione']."</td>
                <td>".$pretest[$identif]."</td>
                <td>".$postest[$identif]."</td>
                
               </tr>";
        }
        $i++;
    }
}

?>

                  </tbody>
                </table>
              </div>
                  </div>
                </div>



          </div>

          <!-- Calendar -->
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Calendario</h6>
                </div>
                

                <!-- Card Body -->
                <div class="card-body">
                  <?php include "calendar.php" ; ?>              
                </div>
              </div>

              
            </div>


        </div>
        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- End of Footer -->

    </div> <!-- End of Content Wrapper. This wraps all things out the sidebar and starts in "startbootstrap-sb-admin-2-gh-pages/navbar.php" -->
    
   </div>
   <!--         End of Page Wrapper -->
      <!-- Modal to delete -->
   <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Per confermare l'eliminazione, digita <span class="font-italic">elimina</span> nel campo</label>
                            <input type="text" class="form-control" id="recipient-delete" required>
                            <input type="hidden" class="recipient form-control" id="recipient-wh">
                            <input type="hidden" class="name form-control" id="recipient-name">
                            <input type="hidden" class="cogno form-control" id="recipient-cogno">
                        </div>

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary" id="btn-delete" disabled>Elimina</button>
                </div>
            </form>
            </div>
        </div>
    </div>    
    
     <!-- Bootstrap core JavaScript-->
     <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>

  <!-- jquery and javascript for the DeleteModal -->
  <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever');
            var imp = button.data('cog');
            var name = button.data('name') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text('Eliminare ' + name + ' ' + imp + ' dalla tabella?');
            modal.find('.modal-body .recipient').val(recipient);
        });
    </script>
    <script>
        var elimina = document.getElementById('recipient-delete');
        var btn_delete= document.getElementById('btn-delete')
        function confirm_delete() {
            if (elimina.value=='elimina') {
                btn_delete.disabled = false;
            }else{
                btn_delete.disabled = true;
            }
            console.log(elimina.value)
        };
        elimina.addEventListener("keyup", confirm_delete);

    </script>
    
</body>
</html>
    