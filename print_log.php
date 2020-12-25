<!DOCTYPE html>
<?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['nim'])){
    session_destroy();
    header('Location: login.php');
}
?>

<html>
<head>
    <title>Detail Complaint Log</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <!------ Include the above in your HEAD tag ---------->
    <style type="text/css">
        ul.timeline {
            list-style-type: none;
            position: relative;
        }
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
        .rapih {
            position: relative;
            left: 15px;
            word-wrap: break-word;
            text-align: justify;
        }
    </style>
</head>
<body>

    <?php
    
    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $query1 = mysqli_query($con, "SELECT * FROM `data_complaint` WHERE `id` = '$id' ");
        $data1 = mysqli_fetch_assoc($query1);
        $query = mysqli_query($con, "SELECT c.`id` AS 'id_log', DATE_FORMAT(b.`tanggal`, '%d %M %Y, %H:%i') AS 'tgl_input_komplain', DATE_FORMAT(a.`tgl_proses`, '%d %M %Y') AS 'tgl_proses', DATE_FORMAT(a.`tgl_proses`, '%H:%i:%s') AS 'waktu_default', DATE_FORMAT(a.`tgl_proses`, '%d %M %Y, %H:%i') AS 'waktu_proses', a.`deskripsi_penanganan`, c.`nama` AS 'nama_admin', b. `status`, d.`kondisi` FROM `log` AS a LEFT JOIN `data_complaint` AS b ON a.`id_complaint` = b.`angka_random` LEFT JOIN `user` AS c ON a.`id_admin` = c.`id` LEFT JOIN `status` AS d ON a.`status` = d.`status` WHERE a.`id_complaint` = '$id' GROUP BY a.`id` ORDER BY a.`id` DESC");

        ?>

        <section id="page-title">
            <div class="container clearfix">
                <h1>DATA COMPLAINT</h1>
                <span><?php echo $data1['subject']; ?></span>
            </div>
        </section><!-- #page-title end -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="timeline">
                        <?php
                        while ($tampil = mysqli_fetch_assoc($query)) {
                            ?>
                            <li>
                                <span class="rapih">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="">
                                    <?php
                                    if ($tampil['waktu_default'] == '00:00:00') {
                                        echo $tampil['tgl_input_komplain'];
                                    } else {
                                        echo $tampil['waktu_proses'];
                                    }
                                    ?>  
                                    </a>
                                <a href="#" class="float-right">
                                    <?php
                                    if ($tampil['waktu_proses'] == '12:00:00') {
                                        echo $tampil['kondisi'];
                                    } else {
                                        echo $tampil['kondisi'];
                                    }
                                    ?>
                                </a>
                                </span>
                                <span class="rapih">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                        if ($tampil['deskripsi_penanganan'] == NULL) {
                                            echo 'Belum ada Tindakan';
                                        } else {
                                            echo $tampil['deskripsi_penanganan'];
                                        }
                                        ?>    
                                    </p>
                                <p class="small">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Diproese Oleh:
                                    <strong>
                                        <?php
                                        if ($tampil['nama_admin'] == NULL) {
                                            echo '-';
                                        } else {
                                            echo $tampil['nama_admin'];
                                        }
                                        ?>    
                                        </strong>
                                </p>
                                </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <br />

        <section id="page-title">
            <div class="container clearfix">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="history.php">History Complaint</a></li>
                    <li><a href="print_log.php?id=<?php echo $angka_random; ?>"><?php echo $data1['subject']; ?></a></li>
                </ol>
            </div>
        </section><!-- #page-title end -->

    <?php } else { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Bad Request</h4>
                </div>
            </div>
        </div>
    <?php } ?>

</body>
</html>