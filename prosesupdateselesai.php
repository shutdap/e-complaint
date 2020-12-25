<?php
include 'koneksi.php';

$nim = $_GET['nim'];

$sql = mysqli_query($con,"UPDATE `data_complaint` SET `status`='3' WHERE `nim` = '$nim' AND `status` = '2' ");

if($sql){
	header('location: diproses.php');
}


?>