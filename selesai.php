<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="css/components/bs-datatable.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>History Complaint | Fakultas Teknologi Informasi Universitas Serang Raya</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <?php
    include "header.php";
    ?>
    <!-- #header end -->

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>DATA COMPLAINT</h1>
            <span>Daftar Complaint yang telah selesai ditangani</span>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="inbox.php">Complaint Masuk</a></li>
                <li><a href="diproses.php">Complaint Diproses</a></li>
                <li class="active">Complaint Selesai</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['nim'])){
    session_destroy();
    header('Location: login.php');
} else {
    $nim = $_SESSION['nim'];
    $status = $_SESSION['status'];
}

if ($status != 1){
    //header('location: proses_login.php?action=logout');
}

?>

        <div class="content-wrap">

            <div class="container clearfix">

                

                <div class="col_full">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nim</th>
                                <th>Nama Pembuat Complaint</th>
                                <th>Perihal</th>
                                <th>Subject</th>
                                <th>Status Komplain </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "koneksi.php";
                            if ($status == 1) {
                                $sql = "SELECT * FROM `data_complaint` WHERE `status` = 99 ORDER BY `id` DESC";    
                            } else if ($status == 2) { // untuk admin Akademik
                                $sql = "SELECT * FROM `data_complaint` WHERE `lingkupkel` = 'Akademik' AND `status` = 99 ORDER BY `id` DESC";
                            } else if ($status == 3) { // untuk admin fasilitas
                                $sql = "SELECT * FROM `data_complaint` WHERE `lingkupkel` = 'Fasilitas' AND `status` = 99 ORDER BY `id` DESC";
                           }
                            $query = mysqli_query($con, $sql) or die("Gagal". mysqli_error($con));
                            while($tampil = mysqli_fetch_array($query)){
                            if($status == 1){ /*Ini buat admin*/
                                if($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say ="Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Pihak Bersangkutan";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Teknisi";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                 elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                } else {
                                    $say = "Selesai Di Tangani";
                                }
                            } elseif ($status == 2){ /*Ini buat admin nilai*/
                                if($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say ="Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Pihak Bersangkutan";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Teknisi";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                 elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                } else {
                                    $say = "Selesai Di Tangani";
                                }
                            } elseif ($status == 3){ /*Ini buat Fasilitas*/
                                if($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say ="Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Pihak Bersangkutan";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Teknisi";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                 elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                } else {
                                    $say = "Selesai Di Tangani";
                                }
                            } elseif ($status == 4){ /*Ini buat admin Pelayanan*/
                                if($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diproses Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang dialihkan pada Bagian " . $tampil['lingkupkel'];
                                }
                                 elseif ($tampil['status'] == 2 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say ="Sedang dialihkan pada Bagian " . $tampil['lingkupkel'];
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Pihak Bersangkutan";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Di Proses";
                                }
                                elseif ($tampil['status'] == 3 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Di Proses";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Pelayanan') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Fasilitas') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                }
                                 elseif ($tampil['status'] == 4 && $tampil['lingkupkel'] == 'Nilai') {
                                    $say = "Sedang Diajukan Ke Dekan";
                                } else {
                                    $say = "Selesai Di Tangani";
                                }
                            } ?>
                                <tr>
                                    <td><?php echo $tampil['tanggal']; ?></td>
                                    <td><?php echo $tampil['nim']; ?></td>
                                    <td><?php echo $tampil['nama']; ?></td>
                                    <td><?php echo $tampil['lingkupkel']; ?></td>
                                    <td><?php echo $tampil['subject']; ?></td>
                                    <td><?php echo $say; ?> </td>
                                    <td><a href="printselesai.php?id=<?php echo $tampil['id']; ?>">Baca</a></a></td>
                                </tr>
                            <?php };?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col_full">
                    <a class="button button-3d button-black nomargin fright" href="index.php?nim=$nim">Back</a>
                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <?php include "footer.php"; ?>
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Bootstrap Data Table Plugin -->
<script type="text/javascript" src="js/components/bs-datatable.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script>

    $(document).ready(function() {
        $('#datatable1').dataTable();
    });

</script>
</body>
</html>