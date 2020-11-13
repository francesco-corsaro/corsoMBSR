<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

    $pretest=array();
$pretest[14]='12-23-2222';
$pretest[34]='64-33-2212';

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
        <p class="mb-4">Benvenuto al corso MBSR, da questa pagina puoi effettuare il login per partecipare al questionario</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert login form -->
            <div class="card shadow mb-4  border-bottom-info">
                  <div class="card-header bg-gradient-info py-3">
                    <h6 class="m-0 font-weight-bold text-white">Partecipa al questionario</h6>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Registrazione</th>
                      <th>Pre-Test</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Registrazione</th>
                      <th>Pre-Test</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
require 'DataBase/ConnectDataBase.php';
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
    
</body>
</html>
    