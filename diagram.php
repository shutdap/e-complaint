<html>
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

    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="css/components/bs-datatable.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>Diagram Complaint | Fakultas Teknologi Informasi Universitas Serang Raya</title>

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
            <h1>DIAGRAM COMPLAINT</h1>
            <span>Gambar Diagram Complaint yang masuk pada Fakultas Teknologi Informasi Universitas Serang Raya</span>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Diagram</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">


        <div class="content-wrap">

            <div class="container clearfix">
                <div class="col_full">
                    <?php 
                        require_once "koneksi.php";
                    ?>
                    <form method="get" class="form-inline">
                        <select class="form-control" name="periode" id="periode">
                            <option value="-" selected disabled>Pilih Periode Tahun</option>
                            <?php
                            include 'koneksi.php';
                            $query_periode = mysqli_query($con, "SELECT YEAR(`tanggal`) AS 'tahun' FROM `data_complaint` GROUP BY YEAR(`tanggal`) ORDER BY YEAR(`tanggal`) ASC ");
                            while ($periode = mysqli_fetch_assoc($query_periode)) {
                            ?>
                            <option value="<?php echo $periode['tahun']; ?>" <?php if (isset($_GET['periode']) == $periode['tahun']) { echo "selected"; } ?>><?php echo $periode['tahun']; ?></option>
                            <?php } ?>
                        </select>
                        &nbsp;
                        <input class="form-control" type="submit" value="Tampilkan" />
                    </form>
                    <div id="container_chart"></div>
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

<!-- Bootstrap Data Table Plugin -->
<script type="text/javascript" src="js/components/bs-datatable.js"></script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $periode = $_GET['periode'];
    /* Query Total Complaint Bulanan */
    $tc1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '1' AND YEAR(`tanggal`) = '$periode' "));
    $tc_1 = $tc1['jumlah'];
    $tc2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '2' AND YEAR(`tanggal`) = '$periode' "));
    $tc_2 = $tc2['jumlah'];
    $tc3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '3' AND YEAR(`tanggal`) = '$periode' "));
    $tc_3 = $tc3['jumlah'];
    $tc4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '4' AND YEAR(`tanggal`) = '$periode' "));
    $tc_4 = $tc4['jumlah'];
    $tc5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '5' AND YEAR(`tanggal`) = '$periode' "));
    $tc_5 = $tc5['jumlah'];
    $tc6 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '6' AND YEAR(`tanggal`) = '$periode' "));
    $tc_6 = $tc6['jumlah'];
    $tc7 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '7' AND YEAR(`tanggal`) = '$periode' "));
    $tc_7 = $tc7['jumlah'];
    $tc8 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '8' AND YEAR(`tanggal`) = '$periode' "));
    $tc_8 = $tc8['jumlah'];
    $tc9 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '9' AND YEAR(`tanggal`) = '$periode' "));
    $tc_9 = $tc9['jumlah'];
    $tc10 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '10' AND YEAR(`tanggal`) = '$periode' "));
    $tc_10 = $tc10['jumlah'];
    $tc11 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '11' AND YEAR(`tanggal`) = '$periode' "));
    $tc_11 = $tc11['jumlah'];
    $tc12 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '12' AND YEAR(`tanggal`) = '$periode' "));
    $tc_12 = $tc12['jumlah'];

    /* Query Total Belum di Proses Bulanan */
    $bpc1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '1' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_1 = $bpc1['jumlah'];
    $bpc2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '2' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_2 = $bpc2['jumlah'];
    $bpc3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '3' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_3 = $bpc3['jumlah'];
    $bpc4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '4' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_4 = $bpc4['jumlah'];
    $bpc5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '5' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_5 = $bpc5['jumlah'];
    $bpc6 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '6' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_6 = $bpc6['jumlah'];
    $bpc7 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '7' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_7 = $bpc7['jumlah'];
    $bpc8 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '8' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_8 = $bpc8['jumlah'];
    $bpc9 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '9' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_9 = $bpc9['jumlah'];
    $bpc10 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '10' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_10 = $bpc10['jumlah'];
    $bpc11 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '11' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_11 = $bpc11['jumlah'];
    $bpc12 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '12' AND YEAR(`tanggal`) = '$periode' AND `status` = '1'"));
    $bpc_12 = $bpc12['jumlah'];

        /* Query Total Dialihkan Bulanan */
    $dc1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '1' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_1 = $dc1['jumlah'];
    $dc2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '2' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_2 = $dc2['jumlah'];
    $dc3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '3' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_3 = $dc3['jumlah'];
    $dc4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '4' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_4 = $dc4['jumlah'];
    $dc5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '5' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_5 = $dc5['jumlah'];
    $dc6 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '6' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_6 = $dc6['jumlah'];
    $dc7 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '7' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_7 = $dc7['jumlah'];
    $dc8 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '8' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_8 = $dc8['jumlah'];
    $dc9 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '9' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_9 = $dc9['jumlah'];
    $dc10 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '10' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_10 = $dc10['jumlah'];
    $dc11 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '11' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_11 = $dc11['jumlah'];
    $dc12 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '12' AND YEAR(`tanggal`) = '$periode' AND `status` = '2'"));
    $dc_12 = $dc12['jumlah'];

    /* Query Total Belum di Proses Bulanan */
    $spc1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '1' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_1 = $spc1['jumlah'];
    $spc2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '2' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_2 = $spc2['jumlah'];
    $spc3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '3' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_3 = $spc3['jumlah'];
    $spc4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '4' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_4 = $spc4['jumlah'];
    $spc5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '5' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_5 = $spc5['jumlah'];
    $spc6 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '6' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_6 = $spc6['jumlah'];
    $spc7 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '7' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_7 = $spc7['jumlah'];
    $spc8 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '8' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_8 = $spc8['jumlah'];
    $spc9 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '9' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_9 = $spc9['jumlah'];
    $spc10 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '10' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_10 = $spc10['jumlah'];
    $spc11 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '11' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_11 = $spc11['jumlah'];
    $spc12 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '12' AND YEAR(`tanggal`) = '$periode' AND `status` = '3'"));
    $spc_12 = $spc12['jumlah'];

    /* Query Total Selesai di Proses Bulanan */
    $selesai1 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '1' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_1 = $selesai1['jumlah'];
    $selesai2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '2' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_2 = $selesai2['jumlah'];
    $selesai3 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '3' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_3 = $selesai3['jumlah'];
    $selesai4 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '4' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_4 = $selesai4['jumlah'];
    $selesai5 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '5' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_5 = $selesai5['jumlah'];
    $selesai6 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '6' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_6 = $selesai6['jumlah'];
    $selesai7 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '7' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_7 = $selesai7['jumlah'];
    $selesai8 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '8' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_8 = $selesai8['jumlah'];
    $selesai9 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '9' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_9 = $selesai9['jumlah'];
    $selesai10 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '10' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_10 = $selesai10['jumlah'];
    $selesai11 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '11' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_11 = $selesai11['jumlah'];
    $selesai12 = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS 'jumlah' FROM `data_complaint` WHERE MONTH(`tanggal`) = '12' AND YEAR(`tanggal`) = '$periode' AND `status` = '99'"));
    $selesai_12 = $selesai12['jumlah'];
}

?>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script>

    Highcharts.chart('container_chart', {
        chart: {
            type: 'column',
        },
        title: {
            text: 'E-Complaint'
        },
        subtitle: {
            text: 'Diagram Complaint untuk tahun 2019'
        },

        xAxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        },

        yAxis: {
            title: {
                text: "Jumlah"
            }
        },

        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },

        series: [{
            name: 'Total Complaint',
            data: [<?php echo $tc_1; ?>, <?php echo $tc_2; ?>, <?php echo $tc_3; ?>, <?php echo $tc_4; ?>, <?php echo $tc_5; ?>, <?php echo $tc_6; ?>, <?php echo $tc_7; ?>, <?php echo $tc_8; ?>, <?php echo $tc_9; ?>, <?php echo $tc_10; ?>, <?php echo $tc_11; ?>, <?php echo $tc_12; ?>]
        }, {
            name: 'Belum Di Peroses',
            data: [<?php echo $bpc_1; ?>, <?php echo $bpc_2; ?>, <?php echo $bpc_3; ?>, <?php echo $bpc_4; ?>, <?php echo $bpc_5; ?>, <?php echo $bpc_6; ?>, <?php echo $bpc_7; ?>, <?php echo $bpc_8; ?>, <?php echo $bpc_9; ?>, <?php echo $bpc_10; ?>, <?php echo $bpc_11; ?>, <?php echo $bpc_12; ?>]
        }, {
            name: 'Sedang Dialihkan',
            data: [<?php echo $dc_1; ?>, <?php echo $dc_2; ?>, <?php echo $dc_3; ?>, <?php echo $dc_4; ?>, <?php echo $dc_5; ?>, <?php echo $dc_6; ?>, <?php echo $dc_7; ?>, <?php echo $dc_8; ?>, <?php echo $dc_9; ?>, <?php echo $dc_10; ?>, <?php echo $dc_11; ?>, <?php echo $dc_12; ?>]
        }, {
            name: 'Sedang di Proses',
            data: [<?php echo $spc_1; ?>, <?php echo $spc_2; ?>, <?php echo $spc_3; ?>, <?php echo $spc_4; ?>, <?php echo $spc_5; ?>, <?php echo $spc_6; ?>, <?php echo $spc_7; ?>, <?php echo $spc_8; ?>, <?php echo $spc_9; ?>, <?php echo $spc_10; ?>, <?php echo $spc_11; ?>, <?php echo $spc_12; ?>]
        }, {
            name: 'Selesai',
            data: [<?php  echo $selesai_1; ?>, <?php  echo $selesai_2; ?>, <?php  echo $selesai_3; ?>, <?php  echo $selesai_4; ?>, <?php  echo $selesai_5; ?>, <?php  echo $selesai_6; ?>, <?php echo $selesai_7; ?>, <?php  echo $selesai_8; ?>, <?php  echo $selesai_9; ?>, <?php  echo $selesai_10; ?>, <?php  echo $selesai_11; ?>, <?php  echo $selesai_12; ?>]
        }]
    });

</script> 

</body>
</html>