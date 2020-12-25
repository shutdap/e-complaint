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
            <h1>DATA PETUGAS</h1>
            <span>Daftar Nama & Akun Petugas</span>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class ="active">Data Petugas</a></li>
                <li><a href="user.php">Registrasi</a></li>
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
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Bagian</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "koneksi.php";

                            $sql = "SELECT * FROM `user` WHERE `status` IN ('2', '3') ORDER BY `id` DESC";    
                            $query = mysqli_query($con, $sql) or die("Gagal". mysqli_error($con));
                            while($tampil = mysqli_fetch_array($query)){
                                if ($tampil['status'] == 1) {
                                    $say = "Belum Diproses";
                                } elseif ($tampil['status'] == 2) {
                                    if($tampil['status'] = 2)
                                        $say = "Akademik";
                                } elseif ($tampil['status'] == 3) {
                                    if($tampil['status'] = 3)
                                        $say = "Fasilitas";
                                } elseif ($tampil['status'] == 99) {
                                    if($tampil['status'] = 99)
                                        $say = "Selesai";
                                } ?>

                                <tr>
                                    <td><?php echo $tampil['nim']; ?></td>
                                    <td><?php echo $tampil['nama']; ?></td>
                                    <td><?php echo $say; ?></td>
                                    <td><?php echo $tampil['email']; ?></td>
                                    <td>
                                        <a href="edit_user.php?id=<?php echo $tampil['id']; ?>">Edit</a></a>
                                        &nbsp;&nbsp;&nbsp;
                                     <a href="delete_user.php?id=<?php echo $tampil['id']; ?>">Delete</a></td>
                                </tr>
                            <?php }; ?>
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