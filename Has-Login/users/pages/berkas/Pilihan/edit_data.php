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
    " SELECT accounts.*, pilihan_bidang.*, biodata.email, biodata.foto_non_formal, data_studi.npm, data_studi.email
      FROM accounts 
      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]'
      JOIN data_studi ON accounts.email = data_studi.email AND data_studi.email = '$_SESSION[email]' 
      JOIN pilihan_bidang ON accounts.email = pilihan_bidang.email AND pilihan_bidang.email = '$_SESSION[email]' 
      WHERE accounts.email = '$_SESSION[email]' "
);

while ($datas = mysqli_fetch_array($sqlselect)) {
    $foto_non_formal = $datas['foto_non_formal'];
    $stats_daftar = $datas['stats_daftar'];

    $npm = $datas['npm'];
    $pilihan_satu = $datas['pilihan_satu'];
    $pilihan_dua = $datas['pilihan_dua'];
    $alasan_pilih_satu = $datas['alasan_pilih_satu'];
    $alasan_pilih_dua = $datas['alasan_pilih_dua'];
    $alasan_ikut = $datas['alasan_ikut'];
    $harapan = $datas['harapan'];
}
if ($stats_daftar >= 1) {
    echo "<script>alert('Maaf tidak bisa mengubah pilihan acara, sudah deadline'); 
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
                                <span>16 - 21 Januari 2023</span>
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

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="fas fa-city menu-icon"></i>
                            <span class="menu-title">Acara</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../Bidang/MIB/">TechnoFair 10.0</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../Bidang/ORSB/">FIKTI SPACE 2.0</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../Bidang/PENSOS/">FIKTI Career 2023</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../Bidang/POLKESMA/">HEROES IX</a></li>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#Berkas" aria-expanded="false" aria-controls="Berkas">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Form Pendaftaran</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Berkas">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../Biodata/">Biodata</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Data_Studi/">Data Studi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Kontak/">Kontak</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Fasilitas_dan_Keahlian/">Fasilitas &
                                        Keahlian</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="../Minat/">Minat</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Riwayat_Organisasi/">Riwayat
                                        Organisasi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Pilihan/">Pilihan Acara</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../Berkas-berkas/">Berkas-berkas</a>
                                </li>
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
                                    <h2 class="font-weight-bold">Pilihan Acara</h2>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <h3 id="currentDate"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 grid-margin stretch-card">
                            <form action="<?php echo htmlspecialchars("../../../config/pilihan.php"); ?>" method="POST">
                                <div class="card">
                                    <div class="card-body">
                                        <a class="btn btn-primary mb-4" role="button" style="border-radius: 6px;" href="<?php echo htmlspecialchars("./"); ?>">Back</a>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Pilihan 1</label>
                                                <div class="form-group">
                                                    <select name="pilihan_satu" class="form-control form-control-lg" id="exampleFormControlSelect1" value="<?= $pilihan_satu; ?>">
                                                        <option value="TECHNOFAIR 10.0" <?php echo (($pilihan_satu == "TECHNOFAIR 10.0") ? "selected" : "") ?>>
                                                            TECHNOFAIR 10.0
                                                        </option>
                                                        <option value="FIKTI SPACE 2.0" <?php echo (($pilihan_satu == "FIKTI SPACE 2.0") ? "selected" : "") ?>>
                                                            FIKTI SPACE 2.0
                                                        </option>
                                                        <option value="FIKTI CAREER 2023" <?php echo (($pilihan_satu == "FIKTI CAREER 2023") ? "selected" : "") ?>>
                                                            FIKTI CAREER 2023
                                                        </option>
                                                        <option value="HEROES IX" <?php echo (($pilihan_satu == "HEROES IX") ? "selected" : "") ?>>
                                                            HEROES IX
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Pilihan 2</label>
                                                <div class="form-group">
                                                    <select name="pilihan_dua" class="form-control form-control-lg" id="exampleFormControlSelect1" value="<?= $pilihan_dua; ?>">
                                                        <option value="TECHNOFAIR 10.0" <?php echo (($pilihan_dua == "TECHNOFAIR 10.0") ? "selected" : "") ?>>
                                                            TECHNOFAIR 10.0
                                                        </option>
                                                        <option value="FIKTI SPACE 2.0" <?php echo (($pilihan_dua == "FIKTI SPACE 2.0") ? "selected" : "") ?>>
                                                            FIKTI SPACE 2.0
                                                        </option>
                                                        <option value="FIKTI CAREER 2023" <?php echo (($pilihan_dua == "FIKTI CAREER 2023") ? "selected" : "") ?>>
                                                            FIKTI CAREER 2023
                                                        </option>
                                                        <option value="HEROES IX" <?php echo (($pilihan_dua == "HEROES IX") ? "selected" : "") ?>>
                                                            HEROES IX
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <label class="form-label">Divisi Yang Diinginkan & Alasan Memilih Pilihan 1</label>
                                                <textarea name="alasan_pilih_satu" class="form-control text-muted" rows="3"><?= $alasan_pilih_satu; ?></textarea>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Divisi Yang Diinginkan & Alasan Memilih Pilihan 2</label>
                                                <textarea name="alasan_pilih_dua" class="form-control text-muted" rows="3"><?= $alasan_pilih_dua; ?></textarea>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label">Alasan mengikuti OPREC VOLUNTEER BEM FIKTI UG</label>
                                                <textarea name="alasan_ikut" class="form-control text-muted" rows="3"><?= $alasan_ikut; ?></textarea>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label">Harapan yang ingin dicapai setelah selesai mengikuti OPREC VOLUNTEER BEM FIKTI UG</label>
                                                <textarea name="harapan" class="form-control text-muted" rows="3"><?= $harapan; ?></textarea>
                                            </div>
                                        </div>
                                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                        

                                        <button type="submit" name="update_pilihan" class="btn btn-primary mt-3" style="border-radius: 10px;">Submit</button>
                                    </div>
                                </div>
                            </form>
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