<?php
$action = $_GET['action'];

if ($action == "register") {

    require_once 'koneksi.php';
    $nim = mysqli_real_escape_string($con, $_POST['register-form-nim']);
    $fullname = mysqli_real_escape_string($con, $_POST['register-form-name']);
    $email = mysqli_real_escape_string($con, $_POST['register-form-email']);
    $password = mysqli_real_escape_string($con, $_POST['register-form-password']);
    $status = mysqli_real_escape_string($con, $_POST['register-form-status']);

    if(!empty($nim) && !empty($fullname) && !empty($status) && !empty($email) && !empty($password)){

        $query = mysqli_query($con, "INSERT INTO `user`(`nim`, `nama`, `email`, `password`, `status`) VALUES ('$nim', '$fullname', '$email', '$password', '$status')");

        if ($query) {
            echo "<script>alert('Anda berhasil Registrasi'); window.location ='user.php' </script>";
        } else {
            echo "<script>alert('Anda gagal Registrasi'); window.location ='user.php' </script>";
        }
    }
    else {
        echo "<script>alert('Anda gagal Registrasi'); window.location ='user.php' </script>";
    }


} else if ($action == "update_user") {

    require_once 'koneksi.php';
    $id = mysqli_real_escape_string($con, $_POST['register-form-id']);
    $nim = mysqli_real_escape_string($con, $_POST['register-form-nim']);
    $fullname = mysqli_real_escape_string($con, $_POST['register-form-name']);
    $email = mysqli_real_escape_string($con, $_POST['register-form-email']);
    $password = mysqli_real_escape_string($con, $_POST['register-form-password']);
    $status = mysqli_real_escape_string($con, $_POST['register-form-status']);

    if(!empty($id) && !empty($nim) && !empty($fullname) && !empty($status) && !empty($email) && !empty($password)){

        $query = mysqli_query($con, "UPDATE `user` SET `nim` = '$nim', `nama` = '$fullname', `email` = '$email', `password` = '$password', `status` = '$status' WHERE `id` = '$id' ");

        if ($query) {
            echo "<script>alert('User berhasil di Update'); window.location ='daftar_petugas.php' </script>";
        } else {
            echo "<script>alert('User gagal di Update'); window.location ='daftar_petugas.php' </script>";
        }
    }
    else {
        echo "<script>alert('User gagal di Update'); window.location ='daftar_petugas.php' </script>";
    }


} elseif($action == "login") {
    include 'koneksi.php';

    $nim = mysqli_real_escape_string($con, $_POST['login-form-nim']);
    $password = mysqli_real_escape_string($con, $_POST['login-form-password']);

    if(!empty($nim) && !empty($password)){
        $query = mysqli_query($con, "SELECT * FROM `user` WHERE `nim`='$nim' AND `password`='$password'");
        $result = mysqli_fetch_array($query);

        $status = $result['status'];
        $id = $result['id'];

        $a = mysqli_num_rows($query);

        if($a == 1) {

            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $id;
            $_SESSION['nim'] = $nim;
            $_SESSION['status'] = $status;

            if ($status == 1){
            	header('location: admin.php');
            } else{
            	header('location: index.php');
            }


        }else {
            echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";session_destroy();
        }
    }else {
        echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";session_destroy();
    }

}elseif($action == "logout"){
    if(!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
    echo "<script>alert('Logout Berhasil!'); window.location ='index.php' </script>";
}
?>