<?php

    require_once 'koneksi.php';
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    if(!empty($id)){

        $query = mysqli_query($con, "DELETE FROM `user` WHERE `id` = '$id' ");

        if ($query) {
            echo "<script>alert('User berhasil di Delete'); window.location ='daftar_petugas.php' </script>";
        } else {
            echo "<script>alert('User gagal di Delete'); window.location ='daftar_petugas.php' </script>";
        }
    }
    else {
        echo "<script>alert('User gagal di Delete'); window.location ='daftar_petugas.php' </script>";
    }

?>