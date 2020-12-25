<?php
include 'koneksi.php';
$id_complaint = $_POST['id_complaint'];
$tgl_proses = $_POST['tgl_proses'];
$angka = $_POST['angka'];
$sts = $_POST['statusp'];
$deskripsi_penanganan = $_POST['deskripsi_penanganan'];
$nama_admin = $_POST['nama_admin'];


if($sts == 1)
{
	$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='2', `tgl_proses` = '$tgl_proses', `angka_random` = '$angka', `deskripsi_penanganan` = '$deskripsi_penanganan', `nama_admin` = '$nama_admin' WHERE `id` = '$id_complaint' AND `status` = '1' ");
}
elseif ($sts == 2) 
{
	$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='3', `tgl_proses` = '$tgl_proses', `angka_random` = '$angka', `deskripsi_penanganan` = '$deskripsi_penanganan', `nama_admin` = '$nama_admin' WHERE `id` = '$id_complaint' AND `status` = '2' ");
}elseif ($sts == 3) 
{
	$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='4', `tgl_proses` = '$tgl_proses', `angka_random` = '$angka', `deskripsi_penanganan` = '$deskripsi_penanganan', `nama_admin` = '$nama_admin' WHERE `id` = '$id_complaint' AND `status` = '3' ");
}else
{
	$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='5', `tgl_proses` = '$tgl_proses', `angka_random` = '$angka', `deskripsi_penanganan` = '$deskripsi_penanganan', `nama_admin` = '$nama_admin' WHERE `id` = '$id_complaint' AND `status` = '4' ");
}


if($sql){
	header('location: index.php');
}


?>