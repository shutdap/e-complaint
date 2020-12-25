<?php


class perhitungan{
    function hitung($nilai_rem,$nilai_rangka){
        require_once "koneksi.php";
        global $con;

        $sql = mysqli_query($con, "SELECT MIN(rem) as min_rem, MAX(rem) as max_rem, AVG(rem) as rata_rem, MIN(rangka) as min_rangka, MAX(rangka) as max_rangka, AVG(rangka) as rata_rangka FROM `data_kendaraan`") or die ("Gagal " . mysqli_error($con));
        if($tampil=mysqli_fetch_array($sql)){
            $min_rem = $tampil['min_rem'];
            $max_rem = $tampil['max_rem'];
            $rata_rem = $tampil['rata_rem'];

            $min_rangka = $tampil['min_rangka'];
            $max_rangka = $tampil['max_rangka'];
            $rata_rangka = $tampil['rata_rangka'];




        }
        $rem['rendah']=  $this->rendah($nilai_rem,$min_rem,$rata_rem);
        $rem['sedang']= $this->sedang($nilai_rem,$min_rem,$max_rem,$rata_rem);

        $rangka['rendah']=  $this->rendah($nilai_rangka,$min_rangka,$rata_rangka);
        $rangka['sedang']= $this->sedang($nilai_rangka,$min_rangka,$max_rangka,$rata_rangka);



        $hasil = array(
            "rem" => $rem,
            "rangka" => $rangka,

        );
        $hasil;
        return $hasil;
    }
    function rendah($nilai, $min_rem,$rata_rem){
        if($nilai <= $min_rem){
            return 1;
        }elseif ($min_rem <= $nilai && $nilai <= $rata_rem){
            $pembagi = $rata_rem - $min_rem;
            $hitung = ($rata_rem - $nilai)/$pembagi;
            return $hitung;
        }elseif ($nilai >= $rata_rem){
            return 0;
        }
    }
    function sedang($nilai,$min_rem,$max_rem,$rata_rem){
        if($nilai <= $min_rem || $nilai >= $max_rem){
            return 0;
        }elseif ($min_rem <= $nilai && $nilai <= $rata_rem){
            $pembagi = $rata_rem - $min_rem;
            $hitung = ($nilai - $min_rem) / $pembagi;
            return $hitung;
        }elseif ($rata_rem <= $nilai && $nilai <= $max_rem){
            return 1;
        }
    }
}




?>