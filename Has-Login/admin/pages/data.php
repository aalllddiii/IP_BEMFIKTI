<?php 
session_start();
ob_start();
require("../config/koneksi.php");

if( !isset($_SESSION["username"]) ){
  header("Location:../login/");
  exit();
}


$email = $_GET['email'];

$biodata = mysqli_query($conn,"SELECT * FROM accounts
                            INNER JOIN biodata USING(email) 
                            INNER JOIN berkas USING(email) 
                            INNER JOIN contacts USING(email) 
                            INNER JOIN data_studi USING(email) 
                            INNER JOIN fasilitas_skills USING(email) 
                            INNER JOIN minat_kegiatan USING(email) 
                            INNER JOIN pilihan_bidang USING(email) 
                            WHERE accounts.email = '$email'");


$riwayat_organisasi = mysqli_query($conn,"SELECT * FROM riwayat_organisasi WHERE email = '$email'");


ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../partials/header.php'); ?>
    <style>
    .table-custom, tr, td{
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #000;
      padding: 8px 20px;
    }
    </style>
</head>
<body>
    <div class="container">
    <?php foreach($biodata as $data):?>
      <div id="data-pendaftar">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3 class="text-center mb-2">Formulir IP BEM FIKTI 2022</h3>
                <div class="row">
                <table class="table-custom mb-3">
                  <tr>
                    <td class="text-muted">I. Data Pribadi</td>
                    <td rowspan="5"><img src="<?php echo "../../requirement/foto_formal/".$data['foto_formal']; ?>" alt="" width="150px"></td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">Nama Lengkap: </span> 
                      <?= $data['nama_lengkap']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">Nama Panggilan: </span> 
                      <?= $data['panggilan']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">TTL: </span> 
                      <?= $data['ttl']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="font-weight-bold">Alamat Rumah:</div> 
                      <?= $data['alamat']; ?>
                  </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">Nomor Telepon Pribadi: </span>
                      <?= $data['no_telp']; ?>
                    </td>
                    <td>
                      <span class="font-weight-bold">Nomor Telepon Orang Tua/Wali: </span>
                      <?= $data['no_telp_ortu']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">E-mail: </span> 
                      <?= $data['email']; ?>
                    </td>
                    <td>
                      <span class="font-weight-bold">ID Line & IG: </span> 
                      <?= $data['id_line']. ' & '. $data['instagram']; ?> 
                  </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span class="font-weight-bold">Motto Hidup: </span>
                      <?= $data['motto']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span class="font-weight-bold">Satu kata yang menggambarkan diri saya:</span>
                      <?= $data['satu_kata']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span class="font-weight-bold">Deskripsi Diri:</span>
                      <?= $data['deskripsi_diri']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted" colspan="2">II. Peminatan</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label class="mt-2 font-weight-bold">Akademik</label> <br>
                      <div class="row">
                        <div class="col-md-8">
                          <?php
                          $all_akademik = array('Web Programming','Mobile Programming','Database','IoT','Jaringan Komputer','Robotic','ERP/System','Yang Lainnya');
                          $akademik = $data['akademik'];
                          $akademik_arr = explode(",",$akademik);
                          foreach($all_akademik as $akademik) :
                            if(!in_array($akademik,$akademik_arr)){
                              $checked_select = "";
                            } else{
                              $checked_select = "checked";
                            }
                          ?>
                          <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$akademik;?>" class="mr-1"/><?= $akademik; ?></label>
                          <?php
                            endforeach;
                          ?>
                          <br> <br>
                        </div>
                      </div>
                      
                      
                      <label class="mt-2 font-weight-bold">Olahraga</label> <br>
                      <div class="row">
                        <div class="col-md-8">
                          <?php
                          $all_olahraga = array('Futsal/Sepak Bola','Bulu Tangkis','Basket','Voli','Panahan','Catur','E-sports','Yang Lainnya');
                          $olahraga = $data['olahraga'];
                          $olahraga_arr = explode(",",$olahraga);
                          foreach($all_olahraga as $olahraga) :
                            if(!in_array($olahraga,$olahraga_arr)){
                              $checked_select = "";
                            } else{
                              $checked_select = "checked";
                            }
                          ?>
                          <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$olahraga;?>" class="mr-1"/><?= $olahraga; ?></label>
                          <?php
                            endforeach;
                          ?>
                          <br> <br>
                        </div>
                      </div>
                      <label class="mt-2 font-weight-bold">Kesenian</label> <br>
                      <?php
                      $all_kesenian = array('Musik','Teater/Drama','Tari Tradisional','Tari Modern','Gambar/Lukis','Stand Up Comedy','Yang Lainnya');
                      $kesenian = $data['kesenian'];
                      $kesenian_arr = explode(",",$kesenian);
                      foreach($all_kesenian as $kesenian) :
                        if(!in_array($kesenian,$kesenian_arr)){
                          $checked_select = "";
                        } else{
                          $checked_select = "checked";
                        }
                      ?>
                      <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$kesenian;?>"     class="mr-1"/><?= $kesenian; ?></label>
                      <?php
                        endforeach;
                      ?>
                      <br><br>
                      <label class="mt-2 font-weight-bold">Media Kreatif</label> <br>
                      <div class="row">
                        <div class="col-md-8">
                          <?php
                          $all_media_kreatif = array('Fotografi','Ilustrasi','Animasi','Desain Grafis','Videografi','Yang Lainnya');
                          $media_kreatif = $data['media_kreatif'];
                          $media_kreatif_arr = explode(",",$media_kreatif);
                          foreach($all_media_kreatif as $media_kreatif) :
                            if(!in_array($media_kreatif,$media_kreatif_arr)){
                              $checked_select = "";
                            } else{
                              $checked_select = "checked";
                            }
                          ?>
                          <label class="mr-2"><input type="checkbox" <?=$checked_select;?>  value="<?=$media_kreatif;?>" class="mr-1"/><?= $media_kreatif; ?></label>
                          <?php
                            endforeach;
                          ?>
                          <br> <br>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted" colspan="2">III. Keahlian</td>
                  </tr>
                  <tr>
                    <td colspan="2"><?= $data['skill']; ?></td>
                  </tr>
                  <tr>
                    <td class="text-muted" colspan="2">IV. Fasilitas Kepimilikan yang Dimiliki</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="row mt-2">
                        <div class="col-md-5">
                          <?php
                          $all_fasilitas = array('Handphone','Laptop','Digital camera/SLR','Handycam','Mobil','Motor');
                          $fasilitas = $data['fasilitas'];
                          $fasilitas_arr = explode(",",$fasilitas);
                          foreach($all_fasilitas as $fasilitas) :
                            if(!in_array($fasilitas,$fasilitas_arr)){
                              $checked_select = "";
                            } else{
                              $checked_select = "checked";
                            }
                          ?>
                          <label class="mr-2"><input type="checkbox" <?=$checked_select;?> value="<?=$fasilitas;?>" class="mr-1"/><?= $fasilitas; ?></label>
                          <?php
                            endforeach;
                          ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                <table  class="table-custom mb-3">
                  <tr>
                    <td class="text-muted" colspan="4">V. Data Studi</td>
                  </tr>
                  <tr>
                    <td><span class="font-weight-bold">NPM</span></td>
                    <td colspan="3"><?= $data['npm']; ?></td>
                  </tr>
                  <tr>
                    <td><span class="font-weight-bold">Kelas</span></td>
                    <td colspan="3"><?= $data['kelas']; ?></td>
                  </tr>
                  <tr>
                    <td><span class="font-weight-bold">Jurusan</span></td>
                    <td colspan="3"><?= $data['jurusan']; ?></td>
                  </tr>
                  </tr>
                  <tr>
                    <td><span class="font-weight-bold">Domisili</span></td>
                    <td colspan="3"><?= $data['domisili']; ?></td>
                  </tr>
                </table>
                <table  class="table-custom mb-3">
                  <tr>
                    <td class="text-muted" colspan="3">VI. Riwayat Pengalaman</td>
                  </tr>
                  <tr class="font-weight-bold text-center">
                    <td>Pengalaman</td>
                    <td>Jabatan</td>
                    <td>Periode</td>
                  </tr>
                  <?php foreach($riwayat_organisasi as $org) : ?>
                  <tr>
                    <td><?= $org['nama_organisasi']; ?></td>
                    <td><?= $org['jabatan']; ?></td>
                    <td><?= $org['periode']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
                <table class="table-custom mb-3">
                  <tr>
                    <td class="text-muted">VII. Alasan Mengikuti OPREC VOLUNTEER BEM FIKTI</td>
                  </tr>
                  <tr>
                    <td><p class="text-justify"><?= $data['alasan_ikut']; ?></p></td>
                  </tr>
                  <tr>
                    <td>
                      <label class="mb-2 font-weight-bold">Pilih 2 Biro/Departemen</label>
                      <ul>
                        <li><?= $data['pilihan_satu']; ?></li>
                        <li><?= $data['pilihan_dua']; ?></li>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">VIII. Divisi Yang Diinginkan & Alasan Memilih Pilihan 1 / 2</td>
                  </tr>
                  <tr>
                    <td>
                      <span class="font-weight-bold">Pilihan 1</span><br>
                      <p class="text-justify">
                        <?= $data['alasan_pilih_satu']; ?>
                      </p><br>
                      <span class="font-weight-bold">Pilihan 2</span><br>
                      <p class="text-justify">
                        <?= $data['alasan_pilih_dua']; ?>
                      </p><br>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">IX. Harapan Dari Mengikuti OPREC VOLUNTEER BEM FIKTI</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-justify">
                        <?= $data['harapan']; ?>
                      </p>
                    </td>
                  </tr>
                  <!--tr>
                    <td class="text-muted">X. Pernyataan</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-justify mt-2">
                      &nbsp; Saya, , telah mengisi formulir pendaftaran untuk mengikuti seleksi menjadi pengurus BEM FIKTI Universitas Gunadarma periode 2021/2022 dengan informasi yang sebenar-benarnya dan lengkap serta dapat dipertanggungjawabkan.
                      </p>
                      <p class="text-justify">
                      &nbsp; Saya bersedia mengikuti seluruh rangkaian kegiatan Open Recruitment Pengurus BEM FIKTI Universitas Gunadarma dengan sungguh-sungguh dan saya bersedia mematuhi seluruh keputusan panitia Open Recruitment. Jika saya diterima menjadi pengurus maka saya akan bertanggung jawab akan atas hal-hal yang saya janjikan dalam rangkaian Open Recruitment.
                      </p> <br>
                      <label class="mb-5"> Depok, </label><br>
                      <label></label>
                    </td>
                  </tr-->
                </table>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
        <?php endforeach; ?>  
    </div>

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

    <!--responsive datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script>
	    window.print();
	</script>
</body>
</html>