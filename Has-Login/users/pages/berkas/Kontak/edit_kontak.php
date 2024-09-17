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
    " SELECT accounts.*, contacts.*, biodata.email, biodata.foto_non_formal, data_studi.npm, data_studi.email
      FROM accounts 
      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]'
      JOIN data_studi ON accounts.email = data_studi.email AND data_studi.email = '$_SESSION[email]' 
      JOIN contacts ON accounts.email = contacts.email AND contacts.email = '$_SESSION[email]' 
      WHERE accounts.email = '$_SESSION[email]' "
);

while ($datas = mysqli_fetch_array($sqlselect)) {
    $foto_non_formal = $datas['foto_non_formal'];
    $stats_daftar = $datas['stats_daftar'];

    $npm = $datas['npm'];
    $id_line = $datas['id_line'];
    $instagram = $datas['instagram'];
    $no_telp = $datas['no_telp'];
    $no_telp_ortu = $datas['no_telp_ortu'];
}
if ($stats_daftar >= 1) {
    echo "<script>alert('Maaf tidak bisa edit kontak, sudah deadline'); 
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
                <a class="navbar-brand brand-logo-mini" href="../../../"><img
                        src="../../../../../assets/images_general/bemfikti.png" alt="logo"></a>
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
                            <img src="../../../../../assets/images_general/no-profiles.png" id="gambar_nodin"
                                class="profile">
                            <?php
                            } else { ?>
                            <img src="../../../../requirement/foto_bebas/<?php echo $foto_non_formal; ?>"
                                id="gambar_nodin" class="profile">
                            <?php
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
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

            <?php include "../includes_berkas/sidebar.php"; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h2 class="font-weight-bold">Kontak</h2>
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
                                    <a class="btn btn-primary mb-3" href="<?= htmlspecialchars("./"); ?>" role="button"
                                        style="border-radius: 10px; padding: 10px 30px; ">
                                        <span class="font-weight-bold text-white fs-10">back</span>
                                    </a>
                                    <h4 class="card-title">Form Edit Kontak</h4>
                                    <form class="forms-sample" method="POST"
                                        action="<?= htmlspecialchars("../../../config/kontak.php"); ?>">
                                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"
                                            hidden>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputName1">Id Line</label>
                                            <input type="text" name="id_line" class="form-control text-muted"
                                                id="exampleInputName1" value="<?= $id_line; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Instagram</label>
                                            <input type="text" name="instagram" class="form-control text-muted"
                                                id="exampleInputEmail3" value="<?= $instagram; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">No Telpon</label>
                                            <input type="text" name="no_telp" class="form-control text-muted"
                                                value="<?= $no_telp; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">No Telpon Orang Tua/Wali</label>
                                            <input type="text" name="no_telp_ortu" class="form-control text-muted"
                                                value="<?= $no_telp_ortu; ?>">
                                        </div>
                                        <button type="submit" name="update_kontak"
                                            class="btn btn-primary mr-2 col-lg-3 col-12"
                                            style="border-radius: 10px;">Update</button>
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