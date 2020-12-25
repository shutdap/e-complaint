<?php
date_default_timezone_set("Asia/Jakarta");

$username = "root";
$password =  "";
$database = "wisuda";
$host = "localhost";

$con = mysqli_connect($host , $username , $password );
mysqli_select_db($con, $database);

if($con  && mysqli_select_db($con, $database)) {
}
else{
    echo "<script>alert('Failed connect to database!');</script>";
}

$default_now = date("Y-m-d H:i:s");

?>