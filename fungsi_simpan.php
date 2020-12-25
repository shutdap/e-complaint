<?php
class simpan{
    function save($data,$status){
        require_once "koneksi.php";
        global $con;

        $merek = mysqli_real_escape_string($con, $data['merek_kendaraan']);
        $pembuat = mysqli_real_escape_string($con, $data['nama_pembuat']);
        $tipe = mysqli_real_escape_string($con, $data['tipe_kendaraan']);
        $jenis = mysqli_real_escape_string($con, $data['jenis_kendaraan']);
        $chassis = mysqli_real_escape_string($con, $data['chassis_no']);
        $engine = mysqli_real_escape_string($con, $data['engine_no']);
        $model = mysqli_real_escape_string($con, $data['model_kendaraan']);
        $letak_motor = mysqli_real_escape_string($con, $data['letak_motor']);
        $silinder =mysqli_real_escape_string($con, $data['jumlah_silinder']);
        $rem = mysqli_real_escape_string($con, $data['sistem_pengereman']);
        $rangka = mysqli_real_escape_string($con, $data['rangka_landasan']);

        $tanggal = mysqli_real_escape_string($con, $data['tanggal']);

        $query = mysqli_query($con, "INSERT INTO `data_kendaraan-1`(`id`,`merek`,`pembuat`,`tipe`,`jenis`,`chassis_no`,`engine_no`,`model`,`letak_motor`,`silinder`,`rem`,`rangka`,`status`,`tanggal`) VALUES ('NULL','$merek','$pembuat','$tipe','$jenis','$chassis','$engine','$model','$letak_motor','$silinder','$rem','$rangka','$status','$tanggal')");
        return $query;
    }

    function update($data,$status,$id){
        require_once "koneksi.php";
        global $con;

        $merek = mysqli_real_escape_string($con, $data['merek_kendaraan']);
        $pembuat = mysqli_real_escape_string($con, $data['nama_pembuat']);
        $tipe = mysqli_real_escape_string($con, $data['tipe_kendaraan']);
        $jenis = mysqli_real_escape_string($con, $data['jenis_kendaraan']);
        $chassis = mysqli_real_escape_string($con, $data['chassis_no']);
        $engine = mysqli_real_escape_string($con, $data['engine_no']);
        $model = mysqli_real_escape_string($con, $data['model_kendaraan']);
        $letak_motor = mysqli_real_escape_string($con, $data['letak_motor']);
        $silinder =mysqli_real_escape_string($con, $data['jumlah_silinder']);
        $rem = mysqli_real_escape_string($con, $data['sistem_pengereman']);
        $rangka = mysqli_real_escape_string($con, $data['rangka_landasan']);
        $tanggal = mysqli_real_escape_string($con, $data['tanggal']);

        $query = mysqli_query($con, "UPDATE `data_kendaraan-1` SET `merek`='$merek',`pembuat`='$pembuat',`tipe`='$tipe',`jenis`='$jenis',`chassis_no`='$chassis',`engine_no`='$engine',`model`='$model',`letak_motor`='$letak_motor',`silinder`='$silinder',`rem`='$rem',`rangka`='$rangka',`status`='$status',`tanggal`='$tanggal' WHERE `id`='$id'");
        return $query;
    }
}
?>