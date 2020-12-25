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
            <span>History Complaint Anda</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">History Complaint</li>
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
}else{
        $nim = $_SESSION['nim'];

} ?>

        <div class="content-wrap">

            <div class="container clearfix">

            

                <div class="col_full">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Subject</th>
                                <th>Nomor Complain </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "koneksi.php";
                            $sql = "SELECT * FROM `data_complaint` WHERE `nim` = '$nim' ORDER BY `id` DESC";
                            $query = mysqli_query($con, $sql) or die("Gagal". mysqli_error($con));
                            while($tampil = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $tampil['tanggal']; ?></td>
                                    <td><?php echo $tampil['lingkupkel']; ?></td>
                                    <td><?php echo $tampil['subject']; ?></td>
                                    <td><?php echo $tampil['angka_random']; ?></td>
                                    <td>
                                        <a href="print.php?id=<?php echo $tampil['id']; ?>">Baca</a></a>
                                    </td>
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