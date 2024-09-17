<?php
    session_start();
    include "../../config/koneksi.php";
    header("X-XSS-Protection: 1; mode=block");

    if (!isset($_SESSION['email']) > 0) {
      echo "<script>alert('Login Dulu ya'); 
      location.href='../../login/';</script>";
    }

    $sqlselect = mysqli_query($con, 
    " SELECT accounts.*, biodata.*
      FROM accounts 
      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]'
      WHERE accounts.email = '$_SESSION[email]' ");
    
    while($datas = mysqli_fetch_array($sqlselect)){
      $panggilan = $datas['panggilan'];
      $foto_non_formal = $datas['foto_non_formal'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OPREC BEM FIKTI UG</title>
  <?php require_once("css-js/css.php"); ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="./">
          <img src="../../assets/images_general/bemfikti.png">
          <span class="capt_logo">BEM FIKTI UG</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="./"><img src="../../assets/images_general/bemfikti.png"
            alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php 
                  if ($foto_non_formal == NULL) { ?>
              <img src="../../assets/images_general/no-profiles.png" id="gambar_nodin" class="profile">
              <?php
                  } else { ?>
              <img src="../requirement/foto_bebas/<?php echo $foto_non_formal; ?>" id="gambar_nodin" class="profile">
              <?php
                  }
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="config/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
              aria-controls="todo-section" aria-expanded="true">Events</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <h4 class="px-3 text-muted font-weight-light mb-0">Timeline</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>19 - 22 Januari 2023</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray"><i>Open Registration</i></p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span> 24 Januari 2023</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Pengumuman Seleksi Berkas</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>26 - 28 Januari 2023</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Wawancara</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>5 Februari 2023</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Pengumuman Final</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                
                <span></span>
              </div>
              <p class="mb-0 font-weight-thin text-gray"></p>
              <p class="mb-0 font-weight-thin text-gray"></p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                
                <span></span>
              </div>
              <p class="mb-0 font-weight-thin text-gray"></p>
            </div>
          </div>
          <!-- To do section tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="./">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Bidang" aria-expanded="false" aria-controls="Bidang">
              <i class="fas fa-city menu-icon"></i>
              <span class="menu-title">Acara</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Bidang">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Bidang/MIB/">TECHNOFAIR 10.0</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Bidang/ORSB/">FIKTI SPACE 2.0</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Bidang/PENSOS/">FIKTI CAREER 2023</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Bidang/POLKESMA/">HEROES IX</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Berkas" aria-expanded="false" aria-controls="Berkas">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Form Pendaftaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Berkas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Biodata/">Biodata</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Data_Studi/">Data Studi</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Kontak/">Kontak</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Fasilitas_dan_Keahlian/">Fasilitas &
                    Keahlian</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Minat/">Minat</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Riwayat_Organisasi/">Riwayat Pengalaman</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Pilihan/">Pilihan Acara</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/berkas/Berkas-berkas/">Berkas-berkas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/Kelulusan">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Kelulusan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h2 class="font-weight-bold">Selamat Datang <?= $panggilan; ?></h2>
                  <h3 class="font-weight-normal mb-0">Lihat timeline <a class="nav-settings" href="#setting-content">
                      disini </a></h3>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <h3 id="currentDate"></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-body">Silahkan bergabung ke dalam grup line untuk mendapatkan informasi lebih lanjut
                    mengenai rangkaian
                    kegiatan Open Recruitment Volunteer BEM FIKTI UG <br> <br>
                    <p class="card-description" style="text-align: justify;">
                                        <b>
                                        (Bagi pengguna Dekstop/PC disarankan menggunakan scan barcode untuk bergabung ke grup, dan bagi pengguna <i>Handphone</i> bisa langsung meng-klik tombol "Join Now" agar dapat bergabung ke grup)
                                        </b></h3>
                  <center>
                    <img src="../../assets/images_general/Grup Line.png" class="justify-content-center" />
                  </center>
                  <center>
                    <button type="button" class="btn btn-primary col-6 text-center mt-3 p-2 font-weight-bold"
                      style="border-radius: 10px;">
                      <span class="fs-13">
                        <a href="https://line.me/R/ti/g/GF4MbwPVdh" style="all: unset;">
                          Join Now
                        </a>
                      </span>
                    </button>
                  </center>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-body">
                  <h1 class="card-title">Surat Pernyataan</h1>
                  <h4>Silakan download surat pernyataan <a href="../requirement/Surat_Pernyataan_Volunteer.pdf"
                      download="../requirement/Surat_Pernyataan_Volunteer.pdf">Disini</a></h4>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-body">
                  <h4 class="card-title">Jangan lupa untuk segera melengkapi form pendaftaran dan semua berkas yang ada,
                    ya!</h4>
                </div>
              </div>

            </div>

            <div class="col-md-4 grid-margin">
              <div class="card">
                <div class="card-body todo">
                  <h4 class="card-title">Data yang diisi</h4>
                  <div class="list-wrapper pt-2">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Biodata
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Data Studi
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Kontak
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Fasilitas dan Skill
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Minat Kegiatan
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Pilihan Acara
                          </label>
                        </div>
                      </li>
                      <li>
                        <div class="form-check form-check-flat">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox">
                            Berkas-berkas
                          </label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer text-center">
          <div class="d-sm-flex justify-content-center">
            <span class="text-center text-sm-left d-block d-sm-inline-block">Maintained by Biro PTI &copy;
              2022/2023</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <?php require_once("css-js/js.php"); ?>
</body>

</html>