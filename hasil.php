<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Select-Boxes CSS -->
    <link rel="stylesheet" href="css/components/select-boxes.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>Fuzzy Logic | Universitas Serang Raya</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <?php
    include "header.php";
    ?>
    <!-- #header end -->

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Fuzzy Logic</h1>
            <span>Hasil Perhitungan Menggunakan Fuzzy Logic</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Fuzzy Logic</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <?php

    if(!empty($_POST['sistem_pengereman']) && !empty($_POST['rangka_landasan'])){
        require_once "koneksi.php";
        include "fungsi_simpan.php";


        $sistem_pengereman = $_POST['sistem_pengereman'];
        $rangka_landasan = $_POST['rangka_landasan'];
        //$gas_emisi = $_POST['gas_emisi'];



        ///---- Perhitungan dilakukan pada File 'fungsi_perhitungan.php'-----///
        require "fungsi_perhitungan.php";
        $hitung = new perhitungan();
        $hasil = $hitung->hitung($sistem_pengereman,$rangka_landasan);

        //---------- Keluarin Value Dari Array Multi --------
        $hasil_rem = $hasil['rem'];
        $hasil_rangka = $hasil['rangka'];
        //$hasil_emisi = $hasil['emisi'];
        //-------------- END PERHITUNGAN --------------

        //print_r($hasil);

    }else{
        echo "<script>alert('Sistem Error, Fuzzy Logic Tidak Dapat Bekerja!'); window.location ='input.php' </script>";
    }

    ?>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_full">
                    <div class="tabs side-tabs responsive-tabs clearfix" id="tab-main">
                        <!-- Navigasi Tab -->
                        <ul class="tab-nav clearfix">
                            <li><a href="#tabs-1">Himpunan Fuzzy</a></li>
                            <li><a href="#tabs-2">Rule</a></li>
                            <li><a href="#tabs-3">Linguistik</a></li>
                            <li><a href="#tabs-4">Perhitungan</a></li>
                            <li><a href="#tabs-5">Mesin Inferensi</a></li>
                            <li><a href="#tabs-6">Defuzzyfikasi</a></li>
                        </ul>

                        <div class="tab-container">

                            <!-- Ini Tab 1 : Table Himpunan Fuzzy -->
                            <div class="tab-content clearfix" id="tabs-1">
                                <div class="col_full">
                                    <h4>Tabel Himpunan Fuzzy</h4>
                                    <?php
                                    //require_once "koneksi.php";
                                    $sql = "SELECT MIN(rem) as min_rem, MIN(rangka) as min_rangka, MAX(rem) as max_rem, MAX(rangka) as max_rangka, MAX(emisi) as max_emisi, AVG(rem) as rata_rem, AVG(rangka) as rata_rangka, AVG(emisi) as rata_emisi FROM `data_kendaraan`";
                                    $query = mysqli_query($con, $sql) or die ("Gagal " . mysqli_error($con));

                                    //Definisi ambil nilai terkecil, terbesar, rata - rata dari setiap variable
                                    if($tampil = mysqli_fetch_array($query)){
                                        $min_rem = $tampil['min_rem'];
                                        $min_rangka = $tampil['min_rangka'];


                                        $max_rem = $tampil['max_rem'];
                                        $max_rangka = $tampil['max_rangka'];


                                        $rata_rem = $tampil['rata_rem'];
                                        $rata_rangka = $tampil['rata_rangka'];


                                    }

                                    // SQL Untuk Outpu = Tidak, Peremajaan, Layak
                                    $sql_status = mysqli_query($con, "SELECT `status`,`min`,`max` FROM `status`") or die("Gagal" . mysqli_error($con));
                                    while ($tampil_status = mysqli_fetch_array($sql_status)){
                                        if($tampil_status['status'] == "tidak"){
                                            $min_tidak = $tampil_status['min'];
                                            $max_tidak = $tampil_status['max'];
                                        }elseif ($tampil_status['status'] == "peremajaan"){
                                            $min_peremajaan = $tampil_status['min'];
                                            $max_peremajaan = $tampil_status['max'];
                                        }elseif ($tampil_status['status'] == "layak"){
                                            $min_layak = $tampil_status['min'];
                                            $max_layak = $tampil_status['max'];
                                        }
                                    }
                                    $sql_output = mysqli_query($con, "SELECT MIN(min) as min_output, MAX(max) as max_output FROM `status`");
                                    if($tampil_out = mysqli_fetch_array($sql_output)){
                                        $min_output = $tampil_out['min_output'];
                                        $max_output = $tampil_out['max_output'];
                                    }
                                    ?>

                                    <!-- Table HImpunan Fuzzy pada tab1 -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fungsi</th>
                                                <th>Nama Variabel</th>
                                                <th>Himpunan Fuzzy</th>
                                                <th>Semesta Pembicara</th>
                                                <th>Domain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="9">Input</td>
                                                <td rowspan="3">Rem</td>
                                                <td>Rendah</td>
                                                <td rowspan="3"> [<?php echo $min_rem . " - ". $max_rem; ?>] </td>
                                                <td>[<?php echo $min_rem . " - ". $rata_rem; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Sedang</td>
                                                <td>[<?php echo $min_rem . " - ". $max_rem; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi</td>
                                                <td>[<?php echo $rata_rem . " - ". $max_rem; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">Rangka Landas</td>
                                                <td>Rendah</td>
                                                <td rowspan="3">[<?php echo $min_rangka . " - ". $max_rangka; ?>]</td>
                                                <td>[<?php echo $min_rangka . " - ". $rata_rangka; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Sedang</td>
                                                <td>[<?php echo $min_rangka . " - ". $max_rangka; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi</td>
                                                <td>[<?php echo $rata_rangka . " - ". $max_rangka; ?>]</td>
                                            </tr>



                                            <tr>
                                                <td rowspan="3">Output</td>
                                                <td rowspan="3">Kondisi</td>
                                                <td>Tidak Layak</td>
                                                <td rowspan="3"> [<?php echo $min_output . " - ". $max_output; ?>] </td>
                                                <td>[<?php echo $min_tidak . " - ". $max_tidak; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Peremajaan</td>
                                                <td>[<?php echo $min_peremajaan . " - ". $max_peremajaan; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Layak</td>
                                                <td>[<?php echo $min_layak . " - ". $max_layak; ?>]</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Ini Tab ke-2 : RULE -->
                            <div class="tab-content clearfix" id="tabs-2">
                                <div class="col_full">
                                    <h4>Rule</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <?php
                                            //SQL Untuk Menampilkan RULE
                                            $sql_rule = mysqli_query($con, "SELECT * FROM `rule-1`") or die ("Gagal " . mysqli_error($con));
                                            while($tampil_rule = mysqli_fetch_array($sql_rule)){
                                                //echo "IF" . " REM " . $tampil_rule['rem']. " RANGKA " . $tampil_rule['rangka']. " EMISI " . $tampil_rule['emisi'] . " THEN ". $tampil_rule['hasil'] . "<br>";
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Rem <?php echo $tampil_rule['rem']; ?></td>
                                                <td>AND</td>
                                                <td>Rangka <?php echo $tampil_rule['rangka']; ?></td>
                                                <td>AND</td>
                                                   <td>THEN</td>
                                                <td><?php echo $tampil_rule['hasil']; ?></td>
                                            </tr>
                                            <?php };?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Ini Tab ke-3 : Menampilkan Linguistik -->
                            <div class="tab-content clearfix" id="tabs-3">
                                <h4>Linguistik</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        $sql_linguistik = mysqli_query($con, "SELECT * FROM `rule-1` WHERE `rem` NOT IN('tinggi') AND `rangka` NOT IN ('tinggi')") or die ("Gagal " . mysqli_error($con));
                                        while($tampil_linguistik = mysqli_fetch_array($sql_linguistik)){

                                            ///---- Fungsi Cari Minimal (Conjucntion) ada disini -----///
                                            $cari_min = array($hasil_rem[$tampil_linguistik['rem']], $hasil_rangka[$tampil_linguistik['rangka']]);

											
                                            if($tampil_linguistik['hasil']=="layak"){
                                                $layak[]= min($cari_min);
                                            }elseif ($tampil_linguistik['hasil']=="peremajaan"){
                                                $peremajaan[]=min($cari_min);
                                            }elseif ($tampil_linguistik['hasil']=="tidak"){
                                                $tidak[]=min($cari_min);
                                            }

                                            //---- End Cari Minimal -----//
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Rem <?php echo $tampil_linguistik['rem']; ?></td>
                                                <td>AND</td>
                                                <td>Rangka <?php echo $tampil_linguistik['rangka']; ?></td>
                                                <td>AND</td>
                                                <td>THEN</td>
                                                <td><?php echo $tampil_linguistik['hasil']; ?></td>
                                            </tr>
                                        <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Ini Tab ke-4 : Perhitungan -->
                            <!-- Variabel PHP Ada diatas pada  table Awal -->
                            <div class="tab-content clearfix" id="tabs-4">
                                <h4>Sistem Pengereman</h4>
                                <p>
                                    Rendah = (<?php echo $hasil_rem['rendah']; ?>)<br>
                                    <?php
                                    echo "1 = ". $sistem_pengereman . " ≤ " . $min_rem . "<br>";
                                    echo $min_rem . " ≤ " . $sistem_pengereman . " ≤ " . $rata_rem . "<br>";
                                    if($hasil_rem['rendah'] !="0" && $hasil_rem['rendah']!= "1"){
                                        echo "( " . $rata_rem . " - " . $sistem_pengereman . " ) / ( " . $rata_rem . " - " . $min_rem . ")<br>";
                                    }
                                    echo "0 = ". $sistem_pengereman . " ≥ " . $rata_rem . "<br>";
                                    ?>
                                </p>
                                <p>
                                    Sedang = (<?php echo $hasil_rem['sedang']; ?>)<br>
                                    <?php
                                    echo "0 = ". $sistem_pengereman . " ≤ " . $min_rem . " atau " . $sistem_pengereman . " ≥ " . $max_rem . "<br>";
                                    echo $min_rem . " ≤ " . $sistem_pengereman . " ≤ " . $rata_rem . "<br>" ;
                                    if($hasil_rem['sedang'] != "1" && $hasil_rem['sedang'] != "0" ){
                                        echo "( " . $sistem_pengereman . " - " . $min_rem . " ) / ( " . $rata_rem . " - " . $min_rem . ")<br>";
                                    }
                                    echo "1 = " . $rata_rem . " ≤ " . $sistem_pengereman . " ≤ " . $max_rem . "<br>";
                                    ?>
                                </p>
                                <h4>Rangka Landasan</h4>
                                <p>
                                    Rendah = (<?php echo $hasil_rangka['rendah']; ?>)<br>
                                    <?php
                                    echo "1 = ". $rangka_landasan . " ≤ " . $min_rangka . "<br>";
                                    echo $min_rangka . " ≤ " . $rangka_landasan . " ≤ " . $rata_rangka . "<br>";
                                    if($hasil_rangka['rendah'] !="0" && $hasil_rangka['rendah']!= "1"){
                                        echo "( " . $rata_rangka . " - " . $rangka_landasan . " ) / ( " . $rata_rangka . " - " . $min_rangka . ")<br>";
                                    }
                                    echo "0 = ". $rangka_landasan . " ≥ " . $rata_rangka . "<br>";
                                    ?>
                                </p>
                                <p>
                                    Sedang = (<?php echo $hasil_rangka['sedang']; ?>)<br>
                                    <?php
                                    echo "0 = ". $rangka_landasan . " ≤ " . $min_rangka . " atau " . $rangka_landasan . " ≥ " . $max_rangka . "<br>";
                                    echo $min_rangka . " ≤ " . $rangka_landasan . " ≤ " . $rata_rangka . "<br>" ;
                                    if($hasil_rangka['sedang'] != "1" && $hasil_rangka['sedang'] != "0" ){
                                        echo "( " . $rangka_landasan . " - " . $min_rangka . " ) / ( " . $rata_rangka . " - " . $min_rangka . ")<br>";
                                    }
                                    echo "1 = " . $rata_rangka . " ≤ " . $rangka_landasan . " ≤ " . $max_rangka . "<br>";
                                    ?>
                                </p>

                            </div>

                            <!-- Ini Tab ke 5 : Mesin Inferensi Mamddani -->
                            <div class="tab-content clearfix" id="tabs-5">
                                <h4>Mesin Inferensi</h4>
                                <h5>Conjunction (^)</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        $sql_linguistik = mysqli_query($con, "SELECT * FROM `rule-1` WHERE `rem` NOT IN('tinggi') AND `rangka` NOT IN ('tinggi')") or die ("Gagal " . mysqli_error($con));
                                        while($tampil_linguistik = mysqli_fetch_array($sql_linguistik)){
                                            $cari_min = array($hasil_rem[$tampil_linguistik['rem']], $hasil_rangka[$tampil_linguistik['rangka']]);
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Rem <?php echo $tampil_linguistik['rem'] . " (". $hasil_rem[$tampil_linguistik['rem']] .") " ;?></td>
                                                <td>AND</td>
                                                <td>Rangka <?php echo $tampil_linguistik['rangka']. " (". $hasil_rangka[$tampil_linguistik['rangka']] .") " ; ?></td>
                                                <td>AND</td>
                                                <td>THEN</td>
                                                <td><?php echo $tampil_linguistik['hasil']. " (". min($cari_min) .") "  ; ?></td>
                                            </tr>
                                        <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                                <h5>Disjunction (v)</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <?php foreach ($tidak as $tidak_v){ ?>
                                                <td>Kondisi is Tidak Layak <?php echo $tidak_v; ?></td>
                                                <?php }
                                                $tidak_dis = max($tidak)?>
                                                <td>Dihasilkan Kondisi is Tidak Layak <?php echo $tidak_dis; ?></td>
                                            </tr>
                                            <tr>
                                                <?php foreach ($peremajaan as $peremajaan_v){ ?>
                                                    <td>Kondisi is Peremajaan <?php echo $peremajaan_v; ?></td>
                                                <?php }
                                                $peremajaan_dis = max($peremajaan)?>
                                                <td>Dihasilkan Kondisi is Peremajaan <?php echo $peremajaan_dis; ?></td>
                                            </tr>
                                            <tr>
                                                <?php foreach ($layak as $layak_v){ ?>
                                                    <td>Kondisi is Layak <?php echo $layak_v; ?></td>
                                                <?php }
                                                $layak_dis = max($layak)?>
                                                <td>Dihasilkan Kondisi is Layak <?php echo $layak_dis; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-content clearfix" id="tabs-6">
                                <?php
                                $deret = 2.5;
                                for($array_out1 = $min_tidak; $array_out1 < $max_tidak; $array_out1 = $array_out1+ $deret){
                                    $center_tidak[]=$array_out1;
                                    $pembagi_tidak[]= $tidak_dis;

                                    $batas_tidak = $max_tidak;
                                }


                                $batas_peremajaan = $max_rem - 6;
                                for($array_out2 = $batas_tidak; $array_out2 < $min_layak; $array_out2 = $array_out2+ $deret){
                                    $center_peremajaan[] = $array_out2;
                                    $pembagi_peremajaan[] = $peremajaan_dis;
                                }

                                for($array_out3 = $min_layak; $array_out3 <=  $max_output; $array_out3 = $array_out3 + $deret){
                                    $center_layak[]=$array_out3;
                                    $pembagi_layak[] = $layak_dis;
                                }

                                $def_tidak = array_sum($center_tidak)* $tidak_dis;
                                $def_peremajaan = array_sum($center_peremajaan)* $peremajaan_dis;
                                $def_layak = array_sum($center_layak)* $layak_dis;
                                $def_center = $def_tidak + $def_peremajaan + $def_layak;

                                $def_pembagi = array_sum($pembagi_tidak) + array_sum($pembagi_peremajaan) + array_sum($pembagi_layak);
                                if($def_pembagi== 0){
                                    $def_pembagi = 1;
                                }
                                $hasil_def = $def_center / $def_pembagi;

                                echo "( (" . implode(" + ",$center_tidak) . ") * " . $tidak_dis . ") +";
                                echo "( (" . implode(" + ",$center_peremajaan) . ") * " . $peremajaan_dis . ") +";
                                echo "( (" . implode(" + ",$center_layak) . ") * " . $layak_dis . ") <br>";
                                echo "------------------------------------------- <br>";
                                echo implode(" + ",$pembagi_tidak) . " + ";
                                echo implode(" + ",$pembagi_peremajaan) . " + ";
                                echo implode(" + ",$pembagi_layak) . " <br>";
                                echo "= " . $hasil_def . "<br>";
                                //echo "Kesimpulannya adalah, kondisi kendaraan ini = ";

                                //---- Logika menentukan Hasil --- //
                                if($min_tidak <= $hasil_def && $hasil_def <= $max_tidak ){
                                    $kondisi = "Tidak";
                                    $warna_kondisi = "alert alert-danger";
                                }elseif ($min_peremajaan <= $hasil_def && $hasil_def <= $min_layak){
                                    $kondisi = "Peremajaan";
                                    $warna_kondisi = "alert alert-warning";
                                    //backup $min_layak <= $hasil_def && $hasil_def <= $max_layak
                                }elseif($hasil_def > $min_layak){
                                    $kondisi = "Layak";
                                    $warna_kondisi = "alert alert-success";
                                }elseif($hasil_def < $min_layak){
                                    $kondisi = "Tidak";
                                    $warna_kondisi = "alert alert-danger";
                                }
                                //echo $kondisi;
                                echo "<br>";

                                $simpan = new simpan();

                                if(!empty($_POST['id_hidden'])){
                                    $simpan->update($_POST,$kondisi,$_POST['id_hidden']);
                                }else{
                                    $simpan->save($_POST,$kondisi);
                                }
                                ?>
                                <div class="<?php echo $warna_kondisi; ?>">Kesimpulannya adalah, kondisi kendaraan ini <strong><?php if($kondisi=="Tidak"){echo "Tidak Layak";}else{echo $kondisi;} ?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <?php include "footer.php"; ?>
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Select-Boxes Plugin -->
<script type="text/javascript" src="js/components/select-boxes.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">
    jQuery(document).ready( function($){

        // Multiple Select
        $(".select-1").select2({
            placeholder: "Select Multiple Values"
        });

        // Loading array data
        var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
        $(".select-data-array").select2({
            data: data
        })
        $(".select-data-array-selected").select2({
            data: data
        });

        // Enabled/Disabled
        $(".select-disabled").select2();
        $(".select-enable").on("click", function () {
            $(".select-disabled").prop("disabled", false);
            $(".select-disabled-multi").prop("disabled", false);
        });
        $(".select-disable").on("click", function () {
            $(".select-disabled").prop("disabled", true);
            $(".select-disabled-multi").prop("disabled", true);
        });

        // Without Search
        $(".select-hide").select2({
            minimumResultsForSearch: Infinity
        });

        // select Tags
        $(".select-tags").select2({
            tags: true
        });

        // Select Splitter
        $('.selectsplitter').selectsplitter();

    });
</script>

</body>
</html>