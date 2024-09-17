<?php
session_start();
include "../../../../../config/koneksi.php";
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['email']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../../../../login/';</script>";
}

$sqlselect = mysqli_query($con, " SELECT accounts.*, biodata.* 
                                      FROM accounts 
                                      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]' 
                                      WHERE accounts.email = '$_SESSION[email]' ");
while ($datas = mysqli_fetch_array($sqlselect)) {
    $panggilan = $datas['panggilan'];
    $foto_non_formal = $datas['foto_non_formal'];
    $stats_daftar = $datas['stats_daftar'];
    $nama_lengkap = $datas['nama_lengkap'];
    $ttl = $datas['ttl'];
    $alamat = $datas['alamat'];
    $motto = $datas['motto'];
    $satu_kata = $datas['satu_kata'];
    $deskripsi_diri = $datas['deskripsi_diri'];
}
if ($stats_daftar >= 1) {
    echo "<script>alert('Maaf tidak bisa edit biodata, sudah deadline'); 
        location.href='./';</script>";
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
    <link rel="stylesheet" href="../../../assets/template/vendors/mdi/css/materialdesignicons.min.css">
    <?php require_once("../../includes/css.php"); ?>
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
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
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
            <?php include "../includes_berkas/sidebar.php"; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h2 class="font-weight-bold">Biodata</h2>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <h3 id="currentDate"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn btn-primary mb-3" href="<?= htmlspecialchars("./"); ?>" role="button" style="border-radius: 10px; padding: 10px 30px; ">
                                        <span class="font-weight-bold text-white fs-10">back</span>
                                    </a>
                                    <h4 class="card-title">Form Update Biodata</h4>
                                    <p class="card-description">
                                        Silakan lengkapi form biodata dibawah ini
                                    </p>
                                    <form class="form-sample mt-4" method="POST" action="<?= htmlspecialchars("../../../config/biodata.php"); ?>">
                                        <input name="email" type="text" value="<?php echo $_SESSION['email']; ?>" hidden>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Email</label>
                                            <input type="text" class="form-control" id="exampleInputName1" value="<?= $_SESSION['email']; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Nama Lengkap</label>
                                            <input type="nama_lengkap" name="nama_lengkap" class="form-control" id="exampleInputEmail3" value="<?= $nama_lengkap; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Tempat, Tanggal Lahir</label>
                                            <input type="text" name="ttl" class="form-control" value="<?= $ttl; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat Tempat Tinggal</label>
                                            <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4" required><?= $alamat; ?> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Motto Hidup</label>
                                            <input type="text" name="motto" class="form-control" value="<?= $motto; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Satu Kata Yang Menggambarkan Diri Kamu</label>
                                            <input type="text" name="satu_kata" class="form-control" id="exampleInputCity1" value="<?= $satu_kata; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Deskripsikan Tengtang Diri Kamu</label>
                                            <textarea class="form-control" name="deskripsi_diri" id="exampleTextarea1" rows="4" required><?= $deskripsi_diri; ?> </textarea>
                                        </div>
                                        <button type="submit" name="update_biodata" class="btn btn-primary mr-2 col-lg-3 col-12" style="border-radius: 10px;">Update</button>
                                    </form>
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

    <?php require_once("../../includes/js.php"); ?>
</body>

</html>