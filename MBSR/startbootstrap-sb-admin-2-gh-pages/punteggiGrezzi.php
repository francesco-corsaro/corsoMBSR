<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';

    


?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title>Corso  Mindfulness - Punteggi grezzi</title>
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
        <p class="mb-4">Da questa pagina puoi visualizzare i punteggi grezzi dei partecipanti </p>

        <!-- Content Row -->
        <div class="row">

            <div class="card shadow mb-4  border-bottom-info">
                  <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Punteggi grezzi di tutti i corsi</h6>
                                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <?php   
                            require 'DataBase/prelevaPuntiGrezzi.php'; 
                            mostra_punteggi_grezzi_tot('Ffmq','Pgwbi','Msp','Compassion','PostFfmq','PostPgwbi','PostMsp','PostCompassion','Edizioni');
                        ?>
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
    