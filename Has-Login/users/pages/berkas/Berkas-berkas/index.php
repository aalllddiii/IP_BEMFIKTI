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
    " SELECT accounts.*, berkas.*, biodata.email, biodata.foto_non_formal, data_studi.npm, data_studi.email
      FROM accounts 
      JOIN biodata ON accounts.email = biodata.email AND biodata.email = '$_SESSION[email]'
      JOIN data_studi ON accounts.email = data_studi.email AND data_studi.email = '$_SESSION[email]' 
      JOIN berkas ON accounts.email = berkas.email AND berkas.email = '$_SESSION[email]' 
      WHERE accounts.email = '$_SESSION[email]' "
);

while ($datas = mysqli_fetch_array($sqlselect)) {
    $foto_non_formal = $datas['foto_non_formal'];
    $stats_daftar = $datas['stats_daftar'];

    $npm = $datas['npm'];
    $krs = $datas['krs'];
    $rangkuman_nilai = $datas['rangkuman_nilai'];
    $foto_formal = $datas['foto_formal'];
    $surat_pernyataan = $datas['surat_pernyataan'];
    $portofolio = $datas['portofolio'];
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
                                    <h2 class="font-weight-bold">Upload Berkas</h2>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <h3 id="currentDate"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form action="<?= htmlspecialchars("../../../config/berkas.php"); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 class="card-title">KRS</h1>
                                        <p class="card-description">
                                            Upload krs terakhir dengan format penamaan file ( KRS_Nama Lengkap.pdf )
                                        </p>
                                        <input type="file" name="krs" required>
                                        <h6 class="mt-3 mb-lg-0 text-muted">File krs yang telah di input : <?= $krs; ?>
                                        </h6>
                                        <div>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                            
                                            <?php
                                            if ($stats_daftar >= 1) { ?>
                                                <h5 class="text-muted mt-3">Maaf tidak bisa mengunggah lagi karena sudah deadline</h5>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="upload_krs" class="btn btn-primary mt-3 col-lg-2 col-12" style="border-radius: 10px;">Submit</button>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form action="<?= htmlspecialchars("../../../config/berkas.php"); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 class="card-title">Rangkuman Nilai</h1>
                                        <p class="card-description">
                                            Upload rangkuman nilai terakhir dengan format penamaan file ( RNilai_Nama
                                            Lengkap.pdf )
                                        </p>
                                        <input type="file" name="rangkuman_nilai" required>
                                        <h6 class="mt-3 mb-lg-0 text-muted">File rangkuman nilai yang telah di input :
                                            <?= $rangkuman_nilai; ?> </h6>
                                        <div>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                            
                                            <?php
                                            if ($stats_daftar >= 1) { ?>
                                                <h5 class="text-muted mt-3">Maaf tidak bisa mengunggah lagi karena sudah deadline</h5>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="upload_rangkuman_nilai" class="btn btn-primary mt-3 col-lg-2 col-12" style="border-radius: 10px;">Submit</button>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form action="<?= htmlspecialchars("../../../config/berkas.php"); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 class="card-title">Foto Formal</h1>
                                        <p class="card-description">
                                            Upload Foto Formal dengan ketentuan :
                                            <br> - background putih
                                            <br> - Mahasiswa/i menggunakan almamater Universitas Gunadarma atau kemeja polos (selain warna putih)
                                            <br> - pas foto 4x6
                                            <br> - foto terbaru kurang dari 6 bulan
                                            <br> - maks 5mb
                                            <br> - foto yang diterima hanya ekstensi (png/ jpg/ jepg)
                                        </p>
                                        <input type="file" name="foto_formal" required>
                                        <h6 class="mt-3 mb-lg-0 text-muted">File foto formal yang telah di input :
                                            <?= $foto_formal; ?> </h6>
                                        <div>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                            
                                            <?php
                                            if ($stats_daftar >= 1) { ?>
                                                <h5 class="text-muted mt-3">Maaf tidak bisa mengunggah lagi karena sudah deadline</h5>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="upload_foto_formal" class="btn btn-primary mt-3 col-lg-2 col-12" style="border-radius: 10px;">Submit</button>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form action="<?= htmlspecialchars("../../../config/berkas.php"); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 class="card-title">Surat Pernyataan</h1>
                                        <p class="card-description">
                                            Upload surat pernyataan yang telah ditandatangani di atas materai dengan format penamaan ( Pernyataan_Nama
                                            Lengkap.pdf )
                                        </p>
                                        <input type="file" name="surat_pernyataan" required>
                                        <h6 class="mt-3 mb-lg-0 text-muted">File surat pernyataan yang telah di input :
                                            <?= $surat_pernyataan; ?> </h6>
                                        <div>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                            
                                            <?php
                                            if ($stats_daftar >= 1) { ?>
                                                <h5 class="text-muted mt-3">Maaf tidak bisa mengunggah lagi karena sudah deadline</h5>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="upload_surat_pernyataan" class="btn btn-primary mt-3 col-lg-2 col-12" style="border-radius: 10px;">Submit</button>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form action="<?= htmlspecialchars("../../../config/berkas.php"); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 class="card-title">Portofolio</h1>
                                        <p class="card-description">
                                             Untuk pilihan divisi Media, silahkan sertakan link Folder Google Drive portofolio kamu.
                                          <br>  Jika tidak memilih divisi Media, isi dengan - (strip) pada kolom portofolio

                                            <br><b> - Pastikan link dapat diakses oleh panitia (Anyone with the link)</b>
                                        </p>
                                        <div class="form-group">
                                            <input type="nama_lengkap" name="portofolio" class="form-control" id="exampleInputEmail3" placeholder="url link gdrive portofolio" required>
                                        </div>
                                        <h6 class="mt-3 mb-lg-0 text-muted">link portofolio yang telah di input : <a href="<?= $portofolio; ?>"> <?= $portofolio; ?> </a></h6>
                                        <div>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                                            
                                            <?php
                                            if ($stats_daftar >= 1) { ?>
                                                <h5 class="text-muted mt-3">Maaf tidak bisa mengunggah lagi karena sudah deadline</h5>
                                            <?php
                                            } else { ?>
                                                <button type="submit" name="upload_portofolio" class="btn btn-primary mt-3 col-lg-2 col-12" style="border-radius: 10px;">Submit</button>
                                            <?php } ?>
                                        </div>

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