<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("location:../index.php");
  exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi E-VOTE SMK SIDING PURI</title>
  <!---------------------------------------------------------------------->
  <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <style>
    body {
      background: url('foto/bg-apps.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;

    }

    img {
      width: 100%;
      height: 280px;
      text-align: center;
    }

    img {
      border-radius: 10px;
    }

    tr,
    td {
      border: none;
    }
  </style>
</head>

<body>

  <div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="adjust-nav">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <!--  <img src="assets/img/logo.png" /> -->
            <h4 style="color: white;">PEMILIHAN KETUA DAN WAKIL KETUA OSIS SMK SIDING PURI 2021</h4>
          </a>
        </div>
        <span class="logout-spn">
          <!-- <a href="../logout.php" style="color:#fff;"><i class="fa fa-circle-o-notch"></i></a>   -->
          <img src="../images/logo_osis.png" style="width: 50px; height: 55px; ">
          <img src="../images/logo_smk.png" style="width: 50px; height: 50px; ">
        </span>
      </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class="floating-menu" role="navigation">
      <div class="sidebar-collapse">
        <div class="menu">
          <ul class="main-menu" id="main-menu">
            <li>
              <img src="../images/kpu.png" style="width: 150px; height: 160px; ">
              <a class="ripple" href="index.php"><i class="fa"></i>Beranda</a>
            </li>
            <li>
              <a href="?page=informasi">
                Informasi</a>
            </li>
            <?php
            $level = $_SESSION['level'] == 'admin';
            if ($level) {
            ?>
              <li>
                <a href="?page=data-siswa">Data Siswa</a>
              </li>
              <li>
                <a href="?page=datapaslon">Data Kandidat</a>
              </li>
              <!-- <li>
                <a href="?page=vote">Vote</a>
              </li> -->
              <li>
                <!-- <a href="hasil_suara.php">Grafik </a> -->
                <a href="?page=hasil-suara">Grafik </a>
              </li>
            <?php } else { ?>
              <li>
                <a href="?page=profil-saya">Profil Saya</a>
              </li>
              <li>
                <a href="?page=profil-kandidat">Profil Kandidat</a>
              </li>
              <?php
              $dataTemp = mysqli_query($koneksi, "SELECT waktu FROM tabel_dpt WHERE username='$_SESSION[username]'");
              $data = mysqli_fetch_array($dataTemp);
              if (@$data['waktu'] == "Sudah") {?>
                <li>
                <a style="pointer-events: none; background-color:lightgray;" href="?page=vote">Vote</a>
              </li>
              <?php } else{?>
                <li>
                  <a href="?page=vote">Vote</a>
                </li>
              <?php }?>
              <li>
                <a href="?page=hasil-suara">Grafik</a>
              </li>
            <?php } ?>

            <li>
              <a href="?page=logout">Logout</a>
            </li>


          </ul>
        </div>
      </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <!-- Content -->
    <?php
    $paramUrl = @$_GET['page'];

    if ($paramUrl == 'informasi') {
      require_once('informasi.php');
    ?>

    <?php } elseif ($paramUrl == 'datapaslon') {
      require_once('input_data_paslon.php');
    ?>
    <?php } elseif ($paramUrl == 'hasil-suara') {
      require_once('hasil_suara.php');
    ?>
    <?php } elseif ($paramUrl == 'data-siswa') {
      require_once('upload_dpt.php');
    ?>
    <?php } elseif ($paramUrl == 'profil-saya') {
      require_once('profile-siswa.php');
    ?>
    <?php } elseif ($paramUrl == 'profil-kandidat') {
      require_once('profile-kandidat.php');
    ?>
    <?php } elseif ($paramUrl == 'logout') {
      require_once('../logout.php');
    ?>
    <?php } elseif ($paramUrl == 'vote') {
      require_once('vote_paslon.php');
    ?>
    <?php } elseif ($paramUrl == 'hasil-suara') {
      require_once('hasil-suara.php');
    ?>
    <?php } else { ?>
      <div id="page-wrapper" class="pt-5">
        <!-- <div class="container bg-primary"><p>sadas</p></div> -->
        <div id="page-inner">
          <div class="row">
            <div class="col-lg-12">
              <h2 style="color: white"><i class="fa fa-desktop"> Beranda</i></h2>
            </div>
          </div>
          <!-- /. ROW  -->

          <div class="row">
            <div class="col-lg-12 ">
              <div class="alert alert-info">
                <strong>
                  <h2><b>SELAMAT DATANG</b></h2>
                  <?php
                  if ($_SESSION['level'] == 'admin') {
                    $q = mysqli_query($koneksi, 'SELECT * FROM tabel_dpt WHERE username="'.$_SESSION['username'].'"');
                    // echo 'SELECT * FROM tabel_dpt WHERE username="'.$_SESSION['username'].'"';
                  }else{
                    $q = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE NIS=".$_SESSION['username']." ");
                    // echo "SELECT * FROM data_siswa WHERE NIS=".$_SESSION['username']." ";
                    // die();
                  }
                  $dataSiswa = mysqli_fetch_array($q);
                  ?>
                  <?php
                  if($_SESSION['level'] == 'admin'){ ?>
                  </strong><b style="font-size: 18px;"><?=$dataSiswa['nama'] ?></b> DI APLIKASI E-VOTE SMK SIDING PURI
                  <?php } ?>
                  <?php
                  if($_SESSION['level'] != 'admin'){ ?>
                  </strong><b style="font-size: 18px;"><?=$dataSiswa['Nama_siswa'] ?></b> DI APLIKASI E-VOTE SMK SIDING PURI
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <div class="footer">
      <div class="row">
        <div class="col-lg-12">
          &copy; Copyright SMKSIDINGPURI <?php echo date('Y') ?> <a href="http://binarytheme.com" style="color:#fff;" target="_blank"></a>
        </div>
      </div>
    </div>

    <script src="../js/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>




</body>

</html>