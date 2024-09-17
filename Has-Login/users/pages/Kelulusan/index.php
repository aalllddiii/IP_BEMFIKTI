<?php
  // echo "<script>alert('Sabar yaa, status kelulusan belum dapat di cek ^_^ '); 
  // location.href='../../';</script>";
  // die();  
?>

<?php
session_start();
include "../../../../config/koneksi.php";
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['email']) > 0) {
  echo "<script>alert('Login Dulu ya'); 
      location.href='../../../../login/';</script>";
}

$sqlselect = mysqli_query(
  $con,
  " SELECT accounts.*, biodata.*
      FROM accounts 
      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]'
      WHERE accounts.email = '$_SESSION[email]' "
);
while ($datas = mysqli_fetch_array($sqlselect)) {
  $panggilan = $datas['panggilan'];
  $foto_non_formal = $datas['foto_non_formal'];
  $status = $datas['status'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OPREC BEM FIKTI UG</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../assets/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/template/vendors/ti-icons/css/themify-icons.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../assets/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../assets/template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/template/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../../assets/template/css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../assets/images_general/bemfikti.png" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../assets/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="./">
          <img src="../../../../assets/images_general/bemfikti.png">
          <span class="capt_logo">BEM FIKTI UG</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="./"><img src="../../../../assets/images_general/bemfikti.png"
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
              <img src="../../../../assets/images_general/no-profiles.png" id="gambar_nodin" class="profile">
              <?php
              } else { ?>
              <img src="../../../requirement/foto_bebas/<?php echo $foto_non_formal; ?>" id="gambar_nodin"
                class="profile">
              <?php
              }
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="../../config/logout.php" class="dropdown-item">
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
                <span>18 - 21 Januari 2023</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Open Registration</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>24 Januari 2023</span>
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
             
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                
              </div>
             
            </div>
          </div>
          <!-- To do section tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../">
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/Bidang/MIB/">TechnoFair 10.0</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/Bidang/ORSB/">FIKTI SPACE 2.0</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/Bidang/PENSOS/">FIKTI Career 2023</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/Bidang/POLKESMA/">HEROES IX</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Biodata/">Biodata</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Data_Studi/">Data Studi</a></li>

                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Kontak/">Kontak</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Fasilitas_dan_Keahlian/">Fasilitas &
                    Keahlian</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Minat/">Minat</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Riwayat_Organisasi/">Riwayat
                    Organisasi</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Pilihan/">Pilihan Acara</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/berkas/Berkas-berkas/">Berkas-berkas</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./">
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
                  <h2 class="font-weight-bold">Hai, <?= $panggilan; ?></h2>
                  <h3 class="font-weight-normal mb-0">Ini adalah halaman status kelulusan anda</h3>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <h3 id="currentDate"></h3>
                  </div>
                </div>
              </div>
            </div>

            <?php
              if ($status == 1) { ?>

            <div class="col-12 mb-4 stretch-card" data-aos="fade-zoom">
              <div class="card card-tale">
                <div class="card-body py-5">
                  <h3 class="mb-5">⭐⭐⭐⭐⭐⭐⭐⭐⭐⭐</h3>
                  <h3 class="font-weight-normal">Selamat <?= $panggilan; ?> kamu LOLOS pada tahap seleksi berkas. Tetap Semangat Yaa!!</h3>
                </div>
              </div>
            </div>
            <?php
              }elseif ($status == 2) { ?>
            <div class="col-12 mb-4 stretch-card" data-aos="fade-zoom">
              <div class="card card-tale bg-danger">
                <div class="card-body py-5">
                  <h3 class="font-weight-normal">Mohon maaf <?= $panggilan; ?> Kamu TIDAK LOLOS pada tahap seleksi berkas. Tetap Semangat Yaa!!</h3>
                </div>
              </div>
            </div>
            <?php } else { }
            ?>

          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer text-center">
          <div class="d-sm-flex justify-content-center">
            <span class="text-center text-sm-left d-block d-sm-inline-block">Maintained by Biro PTI &copy; 2022/2023</span>
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
  <!-- plugins:js -->
  <script src="../../assets/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/template/vendors/chart.js/Chart.min.js"></script>
  <script src="../../assets/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../assets/template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/template/js/off-canvas.js"></script>
  <script src="../../assets/template/js/hoverable-collapse.js"></script>
  <script src="../../assets/template/js/template.js"></script>
  <script src="../../assets/template/js/settings.js"></script>
  <script src="../../assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/template/js/dashboard.js"></script>
  <script src="../../assets/template/js/Chart.roundedBarCharts.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- End custom js for this page-->

  <script>
    AOS.init();

    const timestamp = Date.now()
    const humanReadableDateTime = new Date(timestamp).toDateString()
    // var today = new Date();
    // var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
    document.getElementById("currentDate").textContent = humanReadableDateTime;


    function bacaGambar(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#preview_gambar").change(function () {
      bacaGambar(this);
    });
  </script>
</body>

</html>