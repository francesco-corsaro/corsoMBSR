<?php //VARIABILE DI SESSIONE $frontEndAdmin
    $frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
    
    if ($_SESSION['bypass']!==$frontEndAdmin) {
        header('Location: https://mindfulquestionnaire.altervista.org/MBSR/paginaIniziale.php') ;
    }

    $risultati='active';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title><?php echo $titlePage ; ?></title>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
   
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?php echo $titleBodyPage ; ?></h1>
        

        <!-- Content Row -->
        <div class="row">
              
                <!--avarege tabel -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                require 'DataBase/selectEdizioni.php';
 echo '
                            <div class="card shadow mb-4  border-bottom-info">
               
                             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                 <h6 class="m-0 font-weight-bold text-primary">'.$firstChartTitle.'. Edizione: '.($edizioni[$edi][1] ? $edizioni[$edi][1] : 'Tutte le edizioni').'</h6>
                                 <div class="dropdown no-arrow">
                                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                         <div class="dropdown-header">Edizioni:</div>';
                                         
                                         foreach ($edizioni as $k => $value) {
                                             echo '<a class="dropdown-item" href="'.$_SERVER["PHP_SELF"].'?edition='.$edizioni[$k][0].'">'.$edizioni[$k][1].'</a>';
                                         }
                                         
                                         
echo'                                         <div class="dropdown-divider"></div>
                                         <a class="dropdown-item" href="'.$_SERVER["PHP_SELF"].'">Mostra tutte</a>
                                     </div>
                                 </div>
                             </div>';
                ?>
                <!-- Card Body -->
                <div class="card-body border-bottom-info">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="Table1" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                      <th>Sotto-dimensione</th>
                              <th colspan="2">Media Pre-Test</th>
                              <th colspan="2">Media Post-Test</th>
                              <th colspan="2">T Student</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Sotto-dimensione</th>
                        <th colspan="2">Media Pre-Test</th>
                        <th colspan="2">Media Post-Test</th>
                        <th colspan="2">T Student</th>
                      </tr>
                    </tfoot>
                    <tbody id="corpoTab">
                     
                    </tbody>
                  </table>
                  </div>
                  <hr>
                  <div id="description"></div>
                </div>
              </div>

              <!-- Collapsable Card Example -->
             
        </div>
        

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
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
     <!-- Page level plugins -->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>
    

    