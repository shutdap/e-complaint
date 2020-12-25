<?php
$action = $_GET['action'];

require_once "koneksi.php";

    if($action == "simpan-complaint"){
    $tanggal = $default_now;
    $nim = $_POST ['nim'];
    $nama = $_POST ['nama'];
    $angka_random = $_POST ['angka_random'];
    
    if (isset($_POST['lingkupkel'])) {
        $lingkupkel = $_POST['lingkupkel'];
    } else {
        $lingkupkel = "-";
    }

    $subject = $_POST ['subject'];
    $uraiankel = $_POST ['uraian'];

    if ($_FILES['gambar']['name'] == "") {
        $gambar_baru = "-";
    } else {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $gambar_baru = date('dmYHis').$gambar;
        $path="gambar/".$gambar_baru;
        move_uploaded_file($tmp, $path);
    }

    $status = '1';

    mysqli_query($con,"INSERT INTO `log` (`id_complaint`, `status`) VALUES ('$angka_random', '$status')");
    $query = mysqli_query($con, "INSERT INTO `data_complaint`(`tanggal`, `nim`, `nama`, `lingkupkel`, `subject`, `uraian`, `status`,`angka_random`, `gambar`) VALUES ('$tanggal', '$nim','$nama','$lingkupkel', '$subject', '$uraiankel', '$status', '$angka_random', '$gambar_baru')");

    if($query){
        echo "<script>alert('Complaint Berhasil Ditambahkan'); window.location ='index.php?nim=$nim' </script>";
    }else{
        echo mysqli_error($con);
    }
    
}

?>