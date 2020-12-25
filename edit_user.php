<!DOCTYPE html>
<?php
require_once "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$id' ");
    $tampil = mysqli_fetch_assoc($query);
} else {
    $id = "";
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$id' ");
    $tampil = mysqli_fetch_assoc($query);
}
if(!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['nim'])){
    header('Location: login.php');
}
?>
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

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Edit Petugas | Universitas Serang Raya</title>

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
            <h1>Edit Petugas</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="daftar_petugas.php">Daftar Petugas</a></li>
                <li class="active">Registrasi</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                    <div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>Edit Petugas :</div>
                    <div class="acc_content clearfix">
                        <form id="register-form" name="register-form" class="nobottommargin" action="proses_login.php?action=update_user" method="post">
                            <input type="hidden" id="register-form-id" name="register-form-id" value="<?php echo $tampil['id']; ?>" class="form-control" />
                            <div class="col_full">
                                <label for="register-form-nim">Username :</label>
                                <input type="text" id="register-form-nim" name="register-form-nim" value="<?php echo $tampil['nim']; ?>" class="form-control" />
                            </div>


                             <div class="col_full">
                                <label for="register-form-name">Nama Lengkap Petugas :</label>
                                <input type="text" id="register-form-name" name="register-form-name" value="<?php echo $tampil['nama']; ?>" class="form-control" />
                            </div>

                            <div class="col_full">
                                <label for="register-form-name">Bagian :</label>
                                <Select class="form-control" id="register-form-status" name="register-form-status"> 
                                    <option value="2" <?php if ($tampil['status'] == "2") { echo "selected"; } ?>> Akademik </option>
                                    <option value="3" <?php if ($tampil['status'] == "3") { echo "selected"; } ?>> Fasilitas </option>
                                </Select>
                            </div>

                            <div class="col_full">
                                <label for="register-form-email">Email :</label>
                                <input type="text" id="register-form-email" name="register-form-email" value="<?php echo $tampil['email']; ?>" class="form-control" />
                            </div>

                            <div class="col_full">
                                <label for="register-form-password">Password:</label>
                                <input type="password" id="register-form-password" name="register-form-password" value="<?php echo $tampil['password']; ?>" class="form-control" />
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Update</button>
                            </div>
                        </form>
                    </div>

                </div>

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

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>