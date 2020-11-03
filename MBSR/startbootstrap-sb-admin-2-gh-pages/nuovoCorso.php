<?php //VARIABILE DI SESSIONE $frontEndAdmin
    //$frontEndAdmin='jhbfjJHBHjh8907jHKiUHUu';
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <?php include "head.php"; ?>
  

  <title>Corso  Mindfulness - Partecipa al questionario</title>
 

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
        <p class="mb-4">Ciao amministratore, <br>da questa pagina puoi impostare le date per un nuovo corso</p>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">
            <!-- here insert login form -->
            <div class="card shadow mb-4  border-bottom-warning">
                  <div class="card-header bg-gradient-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white">Crea nuovo corso</h6>
                  </div>
                  <div class="card-body">
                    <form class="user">
                    <div class="form-group row">
                        <label for="courseName" class="col-sm-3 col-form-label pl-4">
                            Dai un nome al nuovo corso <br>(Es: mbsr-apr-mag.2020)
                        </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-user" name="courseName" id="courseName" placeholder="Nome corso..."  title="Dai un nome al corso" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                            <label for="number" class="col-sm-3 col-form-label pt-3 pl-4" >
                            Data inizio corso:<br>Es: 12/04/2020
                            </label>
                            <div class="col-sm-2">
                            <input type="number" id ="number" class="form-control form-control-user" name="gg" placeholder="gg" min="0" max="31" title="Inserisci il giorno" required>
                            </div>
                            <div class="col-sm-2">
                            <input type="number" class="form-control form-control-user" name="month" placeholder="mese" min="0" max="12" title="Inserisci il mese" required>
                            </div>
                            <div class="col-sm-2">
                            <input type="number" class="form-control form-control-user" name="year" placeholder="anno" value="2020" min="2020" max="2023" title="Inserisci il mese" required>
                            </div>
                        
                    </div>
                    <div class="form-group row">
                        
                            <label for="numberEnd" class="col-sm-3 col-form-label pt-3 pl-4" >
                            Data fine corso:
                            </label>
                            <div class="col-sm-2">
                            <input type="number" id="numberEnd" class="form-control form-control-user" name="ggEnd" placeholder="gg" min="0" max="31" title="Inserisci il giorno" required>
                            </div>
                            <div class="col-sm-2">
                            <input type="number" class="form-control form-control-user" name="monthEnd" placeholder="mese" min="0" max="12" title="Inserisci il mese" required>
                            </div>
                            <div class="col-sm-2">
                            <input type="number" class="form-control form-control-user" name="yearEnd" placeholder="anno" min="2020" max="2023" title="Inserisci il mese" required>
                            </div>
                        
                    </div>
                    <div style="height: 20px;"></div>
                    <div class="mx-auto" style="width: 200px;">
                    <button type="button" class="btn btn-primary btn-user" data-toggle="modal" data-target="#confirmNewCourse">Conferma</button>
                    </div>
                    <?php include "modalNewCourse.php";?>


                    </form>
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
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
    
</body>
</html>
    