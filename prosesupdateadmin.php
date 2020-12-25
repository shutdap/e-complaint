<?php
include 'koneksi.php';
$id_complaint = $_POST['id_complaint'];
$angka_random = $_POST['angka_random'];
$tgl_proses = $_POST['tgl_proses'];
$sts = $_POST['status_complaint'];
$deskripsi_penanganan = $_POST['deskripsi_penanganan'];
$nama_admin = $_POST['nama_admin'];
$lingkupkel = $_POST['lingkupkel'];

if ($_FILES['gambar_dari_admin']['name'] == "") {
    $gambar_baru = "-";
} else {
	$gambar = $_FILES['gambar_dari_admin']['name'];
    $tmp = $_FILES['gambar_dari_admin']['tmp_name'];
    $gambar_baru = date('dmYHis').$gambar;
    $path="gambar/".$gambar_baru;
    move_uploaded_file($tmp, $path);
}

mysqli_query($con,"INSERT INTO `log` (`id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES ('$angka_random', '$nama_admin', '$lingkupkel', '$tgl_proses', '$sts', '$deskripsi_penanganan')");

$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='$sts', `tgl_proses` = '$tgl_proses', `deskripsi_penanganan` = '$deskripsi_penanganan', `nama_admin` = '$nama_admin', `lingkupkel` = '$lingkupkel', `gambar_dari_admin` = '$gambar_baru' WHERE `id` = '$id_complaint' ");

if($sql){
	header('location: index.php');
}


?>