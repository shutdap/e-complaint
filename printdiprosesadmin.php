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
                    <form method="post" action="prosesupdateadmin.php" enctype="multipart/form-data">
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
                        <tr>
                            <td>
                                <label>Nim :</label>
                            </td>
                            <td>
                                <?php
                                echo $nim;
                                $tgl_proses = date("Y-m-d H:i:s");
                                ?>
                                <input type="hidden" name="id_complaint" value="<?php echo $id; ?>" readonly/>
                                <input type="hidden" name="tgl_proses" value="<?php echo $tgl_proses; ?>" readonly/>
                                <input type="hidden" name="nama_admin" value="<?php echo $_SESSION['id']; ?>" readonly/>
                                <input type="hidden" name="lingkupkel" value="<?php echo $row['lingkupkel']; ?>" readonly/>
                                <input type="hidden" name="angka_random" value="<?php echo $random; ?>" />

                            </td>
                           
                                
                        </tr>
                        <tr>
                            <td>
                                <label>Nama :</label>
                            </td>
                            <td>
                                <?php echo $nama; ?>
                            </td>
                            
                        </tr>
                        <tr>
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
                                <?php
                                if ($row['gambar'] != '-') {
                                    echo "<img src='gambar/".$row['gambar']."' width='300' height='300'>";
                                } else {
                                    echo "Tidak ada Lampiran";
                                } ?>
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
                                <textarea class="form-control" id="deskripsi_penanganan" name="deskripsi_penanganan" placeholder="Deskripsi Penanganan"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Update Status Complaint :</label>
                            </td>
                            <td>
                                
                        <select id="status_complaint" name="status_complaint" class="form-control" style="width: 100%;">

                            <option value="" <?php echo $selected_default; ?> disabled="disabled">- Pilih Status Complaint -</option>
                            <?php
                            $query_status_complaint = mysqli_query($con, "SELECT * FROM `status` WHERE `status` != '1' ORDER BY `id` ASC ");
                            while($tampil_status = mysqli_fetch_assoc($query_status_complaint)) { ?>
                                <option value="<?php echo $tampil_status['status']; ?>"><?php echo $tampil_status['kondisi']; ?></option>
                            <?php } ?>
                           
                        </select>
                    
                        </td>
                           
                        </tr>

                        <tr>
                            <td><label>Bukti Kegiatan</label></td>
                            <td><input type="file" class="form-control" name="gambar_dari_admin" id="gambar_dari_admin"></td>
                        </tr>

                        </tbody>
                        <?php }?>
                    </table>
                </div>

                 <div class="col_full">
                    <button type="submit" class="button button-3d button-black nomargin fright">Submit</button>
                    <a class="button button-3d button-black nomargin" href="inboxadmin.php?nim=<?php echo $nim; ?>">Back</a>

             
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