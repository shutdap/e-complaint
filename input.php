<!DOCTYPE html>
<?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
    if ($_SESSION['status'] == 1){
        header('Location: proses_login.php?action=logout');
    }
}
if (empty($_SESSION['nim'])){
    session_destroy();
    header('Location: login.php');
}



//------ Ini Untuk Fungsi Edit / Diagnosa Ulang ----//
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $selected = "selected=\"selected\"";
    $selected_default = "";

    $sql = mysqli_query($con, "SELECT * FROM `data_kendaraan-1` WHERE `id`='$id'");
    if($tampil= mysqli_fetch_array($sql)){
        $merek = $tampil['merek'];
        $pembuat = $tampil['pembuat'];
        $tipe = $tampil['tipe'];
        $jenis = $tampil['jenis'];
        $chassis = $tampil['chassis_no'];
        $engine = $tampil['engine_no'];
        $model = $tampil['model'];
        $letak_motor = $tampil['letak_motor'];
        $silinder = $tampil['silinder'];
        $rem = $tampil['rem'];
        $rangka = $tampil['rangka'];

    }
}else{
    $nim = $_SESSION['nim'];
    $sql = mysqli_query($con, "SELECT * FROM `user` WHERE `nim`='$nim'");
    $data = mysqli_fetch_assoc($sql);
    $nama = $data['nama'];
    $selected_default = "selected=\"selected\"";
    $id = "";
    $merek = "";
    $pembuat = "";
    $tipe = "";
    $jenis = "";
    $chassis = "";
    $engine = "";
    $model = "";
    $letak_motor = "";
    $silinder = "";
    $rem = "";
    $rangka = "";

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

    <!-- Select-Boxes CSS -->
    <link rel="stylesheet" href="css/components/select-boxes.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>E-COMPLAINT | Universitas Serang Raya</title>

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
            <h1>Mulai Complaint</h1>
            <span>Masukan Data Complaint</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Buat Komplain</li>
                <li><a href='history.php'> History </a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <form id="input_data" name="input_data" action="proses_input.php?action=simpan-complaint" method="post" class="nobottommargin" enctype="multipart/form-data">
                   
                   <div class="col_half">
                        <label>Tanggal : </label>
                        <input id="tanggal" name="tanggal" readonly class="form-control" placeholder="Tanggal" value="<?php echo $default_now; ?>">
                    </div>

                    <div class="col_half">
                        <label>Nim : </label>
                        <input id="nim" name="nim" class="form-control" readonly ="true" placeholder="Nim" value="<?php echo $nim; ?>">
                    </div>
                    <div class="col_half">
                        <label>Nama Pembuat Complaint : </label>
                        <input id="nama" name="nama" class="form-control" readonly ="true" placeholder="Nama Pembuat Complaint" value="<?php echo $nama; ?>">
                    </div>
                  <!-- <div class="col_half">
                        <label>Lingkup Keluhan :</label>
                        <select id="lingkupkel" name="lingkupkel" class="select-hide form-control bottommargin-sm" style="width: 100%;">

                            <option value="" <?php //echo $selected_default; ?> disabled="disabled">-Pilih Lingkup Keluhan-</option>
                            <option value="Fasilitas" <?php //if($tipe=="Fasilitas"){echo $selected;} ?>>Fasilitas</option>
                            <option value="Nilai" <?php //if($tipe=="Nilai"){echo $selected;} ?>>Nilai</option>
                            <option value="Pelayanan" <?php //if($tipe=="Pelayanan"){echo $selected;} ?>>Pelayanan</option>
                        </select>
                    </div> -->
                    <div class="col_half">
                        <label>Subject Keluhan : </label>
                        <input id="subject" name="subject" class="form-control" placeholder="Tuliskan Subject Keluhan" value="<?php echo $chassis; ?>" >
                    </div>
                     <div class="col_full">
                        <label>Uraian Keluhan : </label>
                        <textarea style="resize:none;width:300px;height:100px;" id="uraian" name="uraian" class="form-control" placeholder="Tuliskan Subject Keluhan" value="<?php echo $chassis; ?>"></textarea>
                    </div>
                    <div class="file-field">
                    <div class="input-default-wrapper mt-3">
                    Select image to upload:
                    <input type="file" class="form-control" name="gambar" id="gambar">
                    <div class="coll_half nobottommargin">
                        <br />
                        <button id="submit_input" name="submit_input" class="button button-3d button-black nomargin" value="submit">Submit</button> 
                    </div>

                    <?php
                    // angka random
                    $query_random = mysqli_query($con, "SELECT FLOOR(RAND()*999999) AS 'angka_random' FROM `data_complaint` WHERE 'angka_random' NOT IN (SELECT `id` FROM `data_complaint`) LIMIT 1");
                    $result_random = mysqli_fetch_array($query_random);
                    if ($result_random == NULL) {
                        $random = '1';
                    } else {
                        $random = $result_random['angka_random'];
                    }
                    ?>
                    
                    <input type="hidden" name="angka_random" value="<?php echo $random; ?>" />

                </form>

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

<!-- Select-Boxes Plugin -->
<script type="text/javascript" src="js/components/select-boxes.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">
    jQuery(document).ready( function($){

        // Multiple Select
        $(".select-1").select2({
            placeholder: "Select Multiple Values"
        });

        // Loading array data
        var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
        $(".select-data-array").select2({
            data: data
        })
        $(".select-data-array-selected").select2({
            data: data
        });

        // Enabled/Disabled
        $(".select-disabled").select2();
        $(".select-enable").on("click", function () {
            $(".select-disabled").prop("disabled", false);
            $(".select-disabled-multi").prop("disabled", false);
        });
        $(".select-disable").on("click", function () {
            $(".select-disabled").prop("disabled", true);
            $(".select-disabled-multi").prop("disabled", true);
        });

        // Without Search
        $(".select-hide").select2({
            minimumResultsForSearch: Infinity
        });

        // select Tags
        $(".select-tags").select2({
            tags: true
        });

        // Select Splitter
        $('.selectsplitter').selectsplitter();

    });
</script

</body>
</html>