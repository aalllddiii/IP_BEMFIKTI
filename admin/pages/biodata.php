<?php 
session_start();
ob_start();
require("../config/function.php");

if( !isset($_SESSION["username"]) ){
  header("Location:../login/");
  exit();
}

$biodata = mysqli_query($conn,"SELECT * FROM accounts
                                INNER JOIN biodata USING(email) 
                                INNER JOIN berkas USING(email) 
                                INNER JOIN contacts USING(email) 
                                INNER JOIN data_studi USING(email) 
                                INNER JOIN fasilitas_skills USING(email) 
                                INNER JOIN minat_kegiatan USING(email) 
                                INNER JOIN pilihan_bidang USING(email) ");

/*$sudah_lengkap =  mysqli_query($conn,"SELECT * FROM accounts
                                INNER JOIN biodata USING(email) 
                                INNER JOIN berkas USING(email) 
                                INNER JOIN contacts USING(email) 
                                INNER JOIN data_studi USING(email) 
                                INNER JOIN fasilitas_skills USING(email) 
                                INNER JOIN minat_kegiatan USING(email) 
                                INNER JOIN pilihan_bidang USING(email) 
                                WHERE biodata.nama_lengkap IS NOT NULL AND biodata.ttl IS NOT NULL AND biodata.alamat IS NOT NULL AND biodata.motto IS NOT NULL AND biodata.satu_kata IS NOT NULL AND biodata.deskripsi_diri IS NOT NULL AND
                                berkas.krs IS NOT NULL AND berkas.rangkuman_nilai IS NOT NULL AND berkas.foto_formal IS NOT NULL AND berkas.foto_non_formal IS NOT NULL AND berkas.surat_pernyataan IS NOT NULL AND
                                contacts.id_line IS NOT NULL AND contacts.instagram IS NOT NULL AND contacts.no_telp IS NOT NULL AND contacts.no_telp_ortu IS NOT NULL AND
                                data_studi.npm IS NOT NULL AND data_studi.kelas IS NOT NULL AND data_studi.jurusan IS NOT NULL AND data_studi.domisili IS NOT NULL AND
                                fasilitas_skills.fasilitas IS NOT NULL AND
                                pilihan_bidang.pilihan_satu IS NOT NULL AND pilihan_bidang.pilihan_dua IS NOT NULL AND pilihan_bidang.alasan_pilih_satu IS NOT NULL AND pilihan_bidang.alasan_pilih_dua IS NOT NULL AND pilihan_bidang.alasan_ikut IS NOT NULL AND pilihan_bidang.harapan IS NOT NULL
                                ");
 */                               
//cek link hapus sudah ditekan atau belum
if( isset($_GET["email"]) && isset($_GET["hapus"])){
  //cek data berhasil diupdate atau tidak
  if( hapusPendaftar($_GET) > 0 ){ 
    echo "
      <script>
        alert('Pendaftar Berhasil Dihapus');
        document.location.href = 'biodata.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Pendaftar Gagal Dihapus');
        document.location.href = 'biodata.php';
      </script>
    ";
  }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Biodata Pendaftar IP BEM FIKTI 2022</title>
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
                  <i class="mdi mdi mdi-account-card-details"></i>
                </span> Biodata
              </h3>
            </div>
            <div class="order" id="order">
              <!--coba datatables start-->
              <table id="example" class="table table-bordered table-hover dt-responsive nowrap text-center" style="width:100%; background-color:#fff;">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Pendaftar</th>
                      <th>Status Lengkap</th>
                      <th>NPM</th>
                      <th>Kelas</th>
                      <th>Pilihan 1</th>
                      <th>Pilihan 2</th>
                      <th>No Telp</th>
                      <th>Line</th>
                      <th>Instagram</th>
                      <th>Email</th>
                      <th>Hapus</th>
                  </tr>
                </thead>
                
                <?php
                  $no = 1;
                  foreach($biodata as $data) :
                    $email = $data['email'];
                    $sudah_lengkap =  mysqli_query($conn,"SELECT * FROM accounts
                                INNER JOIN biodata USING(email) 
                                INNER JOIN berkas USING(email) 
                                INNER JOIN contacts USING(email) 
                                INNER JOIN data_studi USING(email) 
                                INNER JOIN fasilitas_skills USING(email) 
                                INNER JOIN minat_kegiatan USING(email) 
                                INNER JOIN pilihan_bidang USING(email) 
                                WHERE biodata.nama_lengkap IS NOT NULL AND biodata.ttl IS NOT NULL AND biodata.alamat IS NOT NULL AND biodata.motto IS NOT NULL AND biodata.satu_kata IS NOT NULL AND biodata.deskripsi_diri IS NOT NULL AND biodata.foto_non_formal IS NOT NULL AND
                                berkas.krs IS NOT NULL AND berkas.rangkuman_nilai IS NOT NULL AND berkas.foto_formal IS NOT NULL AND  berkas.surat_pernyataan IS NOT NULL AND
                                contacts.id_line IS NOT NULL AND contacts.instagram IS NOT NULL AND contacts.no_telp IS NOT NULL AND contacts.no_telp_ortu IS NOT NULL AND
                                data_studi.npm IS NOT NULL AND data_studi.kelas IS NOT NULL AND data_studi.jurusan IS NOT NULL AND data_studi.domisili IS NOT NULL AND
                                fasilitas_skills.skill IS NOT NULL AND
                                pilihan_bidang.pilihan_satu IS NOT NULL AND pilihan_bidang.pilihan_dua IS NOT NULL AND pilihan_bidang.alasan_pilih_satu IS NOT NULL AND pilihan_bidang.alasan_pilih_dua IS NOT NULL AND pilihan_bidang.alasan_ikut IS NOT NULL AND pilihan_bidang.harapan IS NOT NULL AND 
                                accounts.email='$email'
                                ");
                $lengkap = mysqli_num_rows($sudah_lengkap);
                ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td>
                      <a href="detail_pendaftar.php?email=<?= $data['email']; ?>">
                        <button type="button" class="btn btn-link btn-fw font-weight-normal">
                          <i class="mdi mdi-account"></i> <?= $data['nama_lengkap'];?>
                        </button>
                      </a>
                    </td>
                    <td>
                      <?php if($sudah_lengkap == true){ ?>
                      <label class="badge badge-info">Lengkap</label>
                    <?php } else {?>
                      <label class="badge badge-warning">Belum Lengkap</label>
                    <?php } ?>
                    </td>
                    <td><?= $data['npm'];?></td>
                    <td><?= $data['kelas'];?></td>
                    <td><?= $data['pilihan_satu'];?></td>
                    <td><?= $data['pilihan_dua'];?></td>
                    <td><?= $data['no_telp'];?></td>
                    <td><?= $data['id_line'];?></td>
                    <td><?= $data['instagram'];?></td>
                    <td><?= $data['email'];?></td>
                    <td>
                        <a href="?email=<?= $data['email']; ?>&&hapus=1" onclick="return confirm( 'Yakin <?= $data['nama_lengkap'] . ' ' . $data['npm'] ?> Akan Dihapus?');">
                        <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon btn-sm mr-2">
                          <i class="mdi mdi-close"></i>
                        </button>
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