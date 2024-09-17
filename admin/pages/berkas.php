<?php 
session_start();
ob_start();
require("../config/koneksi.php");

if( !isset($_SESSION["username"]) ){
  header("Location:../login/");
  exit();
}


$berkas = mysqli_query($conn,"SELECT * FROM accounts 
                              INNER JOIN biodata USING(email) 
                              INNER JOIN berkas USING(email)
                              INNER JOIN pilihan_bidang USING(email) 
                              INNER JOIN data_studi USING(email) ");
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Berkas Pendaftar</title>
    <!--partial:partials/header.php start-->
    <?php include('../partials/header.php'); ?> 
    <!--partial:partials/header.php end-->
  </head>

  <body>
    <div class="container-scroller">

    <!--partial:partials/navbar.php start-->
    <?php include('../partials/navbar.php'); ?>
    <!--partial:partials/navbar.php end-->  

      <div class="container-fluid page-body-wrapper">

        <!--partial:partials/_sidebar.php start-->
        <?php include('../partials/sidebar.php'); ?> 
        <!--partial:partials/_sidebar.php end-->

        <div class="main-panel">
          <!-- content-wrapper start -->
          <div class="content-wrapper">

            <div class="page-header">
              <h3 class="page-title text-primary">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi mdi-file"></i>
                </span> Berkas Pendaftar
              </h3>
            </div>
            <!-- content for nav link #daftar_menu start-->
            
  		      <div class="berkas" id="berkas">
              
  		      	<!--coba datatables start-->
              <table id="example" class="table table-bordered table-hover dt-responsive nowrap text-center" style="width:100%; background-color:#fff;">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>NPM</th>
                    <th>Pilihan 1</th>
                    <th>Pilihan 2</th>
                    <th>Foto Formal</th>
                    <th>Foto Non Formal</th>
                    <th>KRS</th>
                    <th>Rangkuman Nilai</th>
                    <th>Portofolio</th>
                  </tr>
                </thead>
                
                <?php
                  $no = 1;
                  foreach($berkas as $file) :
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td>
                      <a href="detail_pendaftar.php?email=<?= $file['email']; ?>">
                        <button type="button" class="btn btn-link btn-fw font-weight-normal">
                          <i class="mdi mdi-account"></i> <?= $file['nama_lengkap'];?>
                        </button>
                      </a>
                    </td>
                    <td><?= $file['npm'];?></td>
                    <td><?= $file['pilihan_satu'];?></td>
                    <td><?= $file['pilihan_dua'];?></td>
                    <td>
                    <?php 
                        if($file['foto_formal'] == NULL ){
                            echo "";
                        } else{
                    ?>
                      <a href="<?php echo "../../Has-Login/requirement/foto_formal/".$file['foto_formal']; ?>" download>
                        <img src="<?php echo "../../Has-Login/requirement/foto_formal/".$file['foto_formal']; ?>" style="width: 100px; height: 100px;">
                      </a>
                    <?php } ?>
                    </td>
                    <td>
                    <?php 
                        if($file['foto_non_formal'] == NULL ){
                            echo "";
                        } else{
                    ?>
                      <a href="<?php echo "../../Has-Login/requirement/foto_bebas/".$file['foto_non_formal']; ?>" download>
                        <img src="<?php echo "../../Has-Login/requirement/foto_bebas/".$file['foto_non_formal']; ?>" style="width: 100px; height: 100px;">
                      </a>
                    <?php } ?>
                    </td>
                    <td>
                      <a href="<?php echo "../../Has-Login/requirement/krs/".$file['krs']; ?>" download>
                        <?= $file['krs']; ?>
											</a>
                    </td>
                    <td>
                      <a href="<?php echo "../../Has-Login/requirement/rangkuman_nilai".$file['rangkuman_nilai']; ?>" download>
                        <?= $file['rangkuman_nilai']; ?>
											</a>
                    </td>
                    <td>
                      <a href="<?php echo "../../Has-Login/requirement/portofolio/".$file['portofolio']; ?>" download>
                        <?= $file['portofolio']; ?>
					            </a>
                    </td>
                  </tr>
                <?php 
                  $no++;
                  endforeach; 
                ?>
              </table>
              <!--coba datatables end-->
  		      </div>
            
          </div>
          <!-- content-wrapper ends -->

          <!--partial:partials/_footer.php start-->
          <?php include('../partials/footer.php'); ?>
          <!--partial:partials/_footer.php end-->
    
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!--datatables script-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!--button datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <!--responsive datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


    <script>
      $(document).ready(function() {
        $('#example').DataTable( {
            pageLength: 20,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
      } );
    </script>
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>