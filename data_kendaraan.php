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
    <title>Fuzzy Logic | Universitas Serang Raya</title>

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
            <h1>DATA KENDARAAN TERSIMPAN</h1>
            <span>Data Tersimpan Hasil Uji Kelayakan Menggunakan Fuzzy Logic</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Data Kendaraan Tersimpan</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_full">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Merek</th>
                                <th>Nama Pembuat</th>
                                <th>Tipe Kendaraan</th>
                                <th>Jenis Kendaraan</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Model</th>
                                <th>Letak Motor Penggerak</th>
                                <th>Jumlah Silinder</th>
                                <th>Sistem Pengereman</th>
                                <th>Rangka Landasan</th>
                                <th>Gas Emisi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "koneksi.php";
                            $sql = "SELECT * FROM `data_kendaraan` ORDER BY `id` DESC";
                            $query = mysqli_query($con, $sql) or die("Gagal". mysqli_error($con));
                            while($tampil = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $tampil['tanggal']; ?></td>
                                    <td><?php echo $tampil['merek']; ?></td>
                                    <td><?php echo $tampil['pembuat']; ?></td>
                                    <td><?php echo $tampil['tipe']; ?></td>
                                    <td><?php echo $tampil['jenis']; ?></td>
                                    <td><?php echo $tampil['chassis_no']; ?></td>
                                    <td><?php echo $tampil['engine_no']; ?></td>
                                    <td><?php echo $tampil['model']; ?></td>
                                    <td><?php echo $tampil['letak_motor']; ?></td>
                                    <td><?php echo $tampil['silinder']; ?></td>
                                    <td><?php echo $tampil['rem']; ?></td>
                                    <td><?php echo $tampil['rangka']; ?></td>
                                    <td><?php echo $tampil['emisi']; ?></td>
                                    <td><?php echo $tampil['status']; ?></td>
                                    <td><a href="print.php?id=<?php echo $tampil['id']; ?>">Print</a> / <a href="input.php?edit=<?php echo $tampil['id']; ?>">Edit</a> / <a href="action.php?action=delete-data-kendaraan&id=<?php echo $tampil['id']; ?>" onclick="return  confirm('Delete Data Kendaraan?')">Delete</a></td>
                                </tr>
                            <?php };?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col_full">
                    <a class="button button-3d button-black nomargin fright" href="print_all.php">Cetak Laporan</a>
                </div>im

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