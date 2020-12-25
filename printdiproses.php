<!DOCTYPE html>
<?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['nim'])){
    session_destroy();
    header('Location: login.php');
}
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM `data_complaint` where `id`='$id'");
if($tampil = mysqli_fetch_array($sql)){
    $tanggal = $tampil['tanggal'];
    $nim = $tampil['nim'];
    $nama = $tampil['nama'];
    $lingkupkel = $tampil['lingkupkel'];
    $Deskripsi = $tampil['deskripsi_penanganan'];
    if (strtotime($tampil['tgl_proses']) == '0') {
        $tanggal_proses = "Belum di Proses Admin";
    } else {
        $tanggal_proses = $tampil['tgl_proses'];
    }
    $admin = $tampil['nama_admin'];
    $admin_query = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `user` where `id`='$admin'"));
    if ($admin_query != null) {
        $nama_admin = $admin_query['nama'];
    } else {
        $nama_admin = "Belum di proses Admin";
    }
    $subject = $tampil['subject'];
    $uraiankel = $tampil['uraian'];
     $selected_default = "selected=\"selected\"";
     $tipe = "";
    $status_asli = $tampil['status'];
    if ($status_asli == 1  ) {
        $status = "Belum di Proses";
    }
    if ($status_asli == 2 && $tampil['lingkupkel'] == 'Fasilitas' ) {
        $status = "Sedang Diproses Oleh Bagian " . $tampil['lingkupkel'];
    }
    if ($status_asli == 2 && $tampil['lingkupkel'] == 'Akademik' ) {
        $status = "Sedang Diproses Oleh Bagian " . $tampil['lingkupkel'];
    }
    if ($status_asli == 3 && $tampil['lingkupkel'] == 'Fasilitas' ) {
        $status = "Sedang Memanggil Teknisi Untuk Di Perbaiki";
    }
    if ($status_asli == 3 && $tampil['lingkupkel'] == 'Akademik' ) {
        $status = "Sedang Menghubungi Dekan Agar Di Berikan Surat Lanjutan";
    }
    if ($status_asli == 4 && $tampil['lingkupkel'] == 'Fasilitas' ) {
        $status = "Sedang Menghubungi Pihak Yang Bersangkutan";
    }
    if ($status_asli == 4 && $tampil['lingkupkel'] == 'Akademik' ) {
        $status = "Sedang Menghubungi Pihak Yang Bersangkutan";
    }
    if ($status_asli == 5  ) {
        $status = "Selesai Di Tangani, Terimakasih";
    }
    $random = $tampil['angka_random'];
    

    // $nim = $_SESSION['nim'];
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
    <title>Lampiran Complaint <?php echo $nim . " ". $nama ?> - E - COMPLAINT | Fakultas Teknologi Informasi Universitas Serang Raya </title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <div class="heading-block center">
                    <h1>Data Complaint yang diajukan</h1>
                    <span>Fakultas Teknologi Informasi | Universitas Serang Raya</span>
                </div>
                <?php
                    $id = $_GET['id'];
                    $sql1 = mysqli_query($con, "SELECT * FROM `data_complaint` where `id`='$id'");
                    while ($row=mysqli_fetch_array($sql1)){
                ?>
                <div class="col_full">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td>
                                <label>Tanggal Pengajuan :</label>
                            </td>
                            <td>
                                <?php echo $tanggal; ?>
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                <label>Nim :</label>
                            </td>
                            <td>
                                <?php echo $nim; ?>
                            </td>
                           
                                
                        </tr>
                        <tr class="active">
                            <td>
                                <label>Nama :</label>
                            </td>
                            <td>
                                <?php echo $nama; ?>
                            </td>
                            
                        </tr>
                        <tr class="active">
                            <td>
                                <label>Perihal :</label>
                            </td>
                            <td>
                                <?php echo $lingkupkel; ?>
                            </td>
                           
                        </tr>
                        <tr>
                            <td>
                                <label>Subject : </label>
                            </td>
                            <td>
                                <?php echo $subject; ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <label>Uraian Komplain :</label>
                            </td>
                            <td>
                                <?php echo $uraiankel; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nomor Complaint :</label>
                            </td>
                            <td>
                                <?php echo $random; ?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Lampiran :</label>
                            </td>
                            <td>
                                <?php echo "<img src='gambar/".$row['gambar']."' width='300' height='300'>"?>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Tanggal Di Proses :</label>
                            </td>
                            <td>
                                <?php echo $tanggal_proses;?>
                            </td>
                        </tr>
                           <tr>
                            <td>
                                <label>Di Proses Oleh : </label>
                            </td>
                            <td>
                                <?php echo $nama_admin; ?>
                            </td>
                        </tr>
                           <tr>
                            <td>
                                <label>Deskripsi Penanganan :   </label>
                            </td>
                            <td>
                                <?php echo $Deskripsi ?>
                            </td>
                        </tr>
                         <tr>
                            <?php
                            if($status_asli == 5 ){
                                $class = "success";
                            }elseif($status_asli == 2 || $status_asli == 3 || $status_asli == 4){
                                $class = "warning";
                            }else{
                                $class = "danger";
                            }
                            if ($lingkupkel == NULL) {
                                $complaint_anda = "";
                            } else {
                                $complaint_anda = "mengenai <strong> " .$lingkupkel. "</strong>";
                            }
                            ?>
                            <td colspan="7" class="<?php echo $class; ?>">
                                Complaint Saat Ini <strong> <?php echo $status; ?><input type="text" style="display: none" name="statusp" value="<?php echo $status_asli; ?>">
                                </strong>
                            </td>
                        </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </div>

                 <div class="col_full">
                    
                    <a class="button button-3d button-black nomargin fright" href="diproses.php?nim=$nim">Back</a>

             
            </div>

            </div>

        </div>

    </section><!-- #content end -->

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