<?php
$action = $_GET['action'];

require_once "koneksi.php";
if($action == "update-rule"){

    $id = $_GET['id'];
    $rem = $_POST['rem'];
    $rangka = $_POST['rangka'];
    $emisi = $_POST['emisi'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "UPDATE `rule` SET `rem`='$rem',`rangka`='$rangka',`emisi`='$emisi',`hasil`='$hasil' WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Update Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }
}elseif($action == "save-rule"){
    $rem = $_POST['rem'];
    $rangka = $_POST['rangka'];
    $emisi = $_POST['emisi'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "INSERT INTO `rule`(`rem`, `rangka`, `emisi`, `hasil`) VALUES ('$rem','$rangka','$emisi','$hasil')");
    if($query){
        echo "<script>alert('Tambah Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}elseif($action == "delete-rule"){
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `rule` WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Delete Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}elseif($action == "delete-data-kendaraan"){
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `data_kendaraan` WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Delete Data Kendaraan Berhasil!'); window.location ='data_kendaraan.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}
?>