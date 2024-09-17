<?php
session_start();
include "../../../../../config/koneksi.php";
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['email']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../../../../login/';</script>";
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
    <link rel="stylesheet" href="../../../assets/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../../assets/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../assets/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../assets/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/template/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../../assets/template/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../../assets/template/css/custom.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../../../../assets/images_general/bemfikti.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../../assets/template/vendors/mdi/css/materialdesignicons.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="./">
                    <img src="../../../../../assets/images_general/bemfikti.png">
                    <span class="capt_logo">BEM FIKTI UG</span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="../../../"><img src="../../../../../assets/images_general/bemfikti.png" alt="logo"></a>
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
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <?php
                            if ($foto_non_formal == NULL) { ?>
                                <img src="../../../../../assets/images_general/no-profiles.png" id="gambar_nodin" class="profile">
                            <?php
                            } else { ?>
                                <img src="../../../../requirement/foto_bebas/<?php echo $foto_non_formal; ?>" id="gambar_nodin" class="profile">
                            <?php
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a href="../../../config/logout.php" class="dropdown-item">
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
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
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
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Events</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <h4 class="px-3 text-muted font-weight-light mb-0">Timeline</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>18 - 21 Januari 2023</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray"><i>Open Registration</i></p>
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
                                <span>26 - 28 Februari 2023</span>
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
                        <a class="nav-link" href="../../../">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="fas fa-city menu-icon"></i>
                            <span class="menu-title">Acara</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../MIB/">TECHNOFAIR 10.0</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../ORSB/">FIKTI SPACE 2.0</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../PENSOS/">FIKTI CAREER 2023</a></li>
                                <li class="nav-item"> <a class="nav-link" href="./">HEROES IX</a></li>
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
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Biodata">Biodata</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Data_Studi/">Data Studi</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Kontak/">Kontak</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Fasilitas_dan_Keahlian/">Fasilitas & Keahlian</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Minat/">Minat</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Riwayat_Organisasi/">Riwayat Pengalaman</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Pilihan/">Pilihan Acara</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../../berkas/Berkas-berkas/">Berkas-berkas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Kelulusan/">
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
                                    <h2 class="font-weight-bold">HEROES IX</h2>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <h3 id="currentDate"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="border-radius: 10px !important;">
                                <div class="card-body">
                                    <h4 class="card-title">Deskripsi</h4>
                                    <p class="card-text" style="text-align: justify;">Merupakan program kerja yang berbentuk kegiatan bakti sosial yang dilaksanakan oleh Mahasiswa/i FIKTI UG di wilayah yang memiliki suatu permasalahan dalam
                                                                                    keseharian. Selain itu, HEROES IX juga merupakan bentuk implementasi dari Tri Dharma Perguruan Tinggi yaitu pengajaran dan
                                                                                    pengabdian kepada masyarakat karena dalam acara ini terdapat kegiatan seperti melakukan pengajaran tentang teknologi, kerja bakti, dan kegiatan sosial lainnya.</p>
                                    <p class="card-description" style="text-align: justify;">
                                        <b>
                                        Divisi yang tersedia : Acara, Media, Danus, Sponsorship, Humas, Perlengkapan
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Humas.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi Acara</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi ini bertanggung jawab  untuk menyusun, merencanakan, dan mengelola kegiatan, seperti menentukan tema, tujuan, dan jadwal kegiatan, serta mengkoordinasikan dengan divisi lain dalam panitia untuk memastikan kegiatan berlangsung dengan lancar dan sukses.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Humas.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi Danus</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi yang bertanggung jawab untuk mengelola pengeluaran dan pendapatan dana sesuai dengan rencana anggaran yang telah ditetapkan, mengidentifikasi sumber dana dalam kegiatan yang akan diselenggarakan oleh panitia tersebut.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Bismit.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi Media</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi ini bertanggung jawab untuk menyusun dan melakukan eksekusi konsep desain kegiatan yang dibutuhkan, serta mengkoordinasikan dengan divisi lain dalam panitia untuk memastikan desain yang digunakan sesuai dengan tema dan tujuan kegiatan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Bismit.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi Sponsorship</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi yang bertanggung jawab untuk mencari dan mengelola sumber pendanaan dari pihak sponsor yang berkepentingan, mengidentifikasi potensi sponsor, menyusun proposal dan menjalin komunikasi dengan sponsor, serta mengatur kesepakatan dan perkiraan pendanaan dari sponsor.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Bismit.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi Humas</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi yang bertanggung jawab untuk menyusun strategi komunikasi dan mengelola hubungan dengan media,  menyampaikan informasi yang tepat dan akurat, serta menjaga jalur komunikasi dengan pihak yang berkepentingan dalam kegiatan yang akan diselenggarakan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-3 mb-lg-0 stretch-card ">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">
                                                <!-- <img src="../../../../../assets/images_bidang/Bismit.png" class="img-lg"> -->
                                                <span class="fs-18">Divisi perlengkapan</span>
                                            </h4>
                                            <p class="fs-17 mb-2" style="text-align: justify;">Divisi perlengkapan yang bertanggung jawab untuk mengelola dan mengatur segala sesuatu yang diperlukan untuk kelancaran pelaksanaan acara yang akan diselenggarakan oleh panitia tersebut, seperti sound system, lighting, stage, panggung, platform video konferensi, dan berbagai perlengkapan lainnya.</p>
                                        </div>
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
    <script src="../../../assets/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../assets/template/vendors/chart.js/Chart.min.js"></script>
    <script src="../../../assets/template/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../../assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../../assets/template/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/template/js/off-canvas.js"></script>
    <script src="../../../assets/template/js/hoverable-collapse.js"></script>
    <script src="../../../assets/template/js/template.js"></script>
    <script src="../../../assets/template/js/settings.js"></script>
    <script src="../../../assets/template/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../../assets/template/js/dashboard.js"></script>
    <script src="../../../assets/template/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

    <script>
        const timestamp = Date.now()
        const humanReadableDateTime = new Date(timestamp).toDateString()
        // var today = new Date();
        // var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        document.getElementById("currentDate").textContent = humanReadableDateTime;
    </script>
</body>

</html>