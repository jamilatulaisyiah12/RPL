<?php
// session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index.php");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  $nim_ketua= mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
  $nm_paslon_ketua= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_ketua']);
  $nim_wakil= mysqli_real_escape_string($koneksi, $_POST['nim_wakil']);
  $nm_paslon_wakil= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_wakil']);
  $no_urut= mysqli_real_escape_string($koneksi, $_POST['no_urut']);

  if($_POST['simpan']){
    $ekstensi_diperbolehkan = array('png','jpg','JPG');
    $gambar1 = $_FILES['gambar1']['name'];
    $x = explode('.', $gambar1);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar1']['size'];
    $file_tmp = $_FILES['gambar1']['tmp_name'];     
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran <= 2000000){          
        move_uploaded_file($file_tmp, 'foto/'.$gambar1);
        $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar1')");
        $gambar2 = $_FILES['gambar2']['name'];
        $x = explode('.', $gambar2);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['gambar2']['size'];
        $file_tmp = $_FILES['gambar2']['tmp_name'];     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran <= 2000000){          
            move_uploaded_file($file_tmp, 'foto/'.$gambar2);
            $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar2')");
          }
        }
      }
    }
  }

  mysqli_query($koneksi,"INSERT INTO data_paslon(id, nim_ketua, nm_paslon_ketua, gambar1, nim_wakil, nm_paslon_wakil, gambar2, no_urut)
    VALUES ('','$nim_ketua','$nm_paslon_ketua','$gambar1','$nim_wakil','$nm_paslon_wakil','$gambar2','$no_urut')");

  echo "<script>window.alert('Berhasil')
  window.location='input_data_paslon.php'</script>";

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body>

  <div id="wrapper">

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-lg-12">
            <h2 style="color: white"><i class="fa fa-user"> Upload DPT</i></h2>   
          </div>
        </div>


        <div class="row">
          <div class="col-lg-6">
            <?php 
            if(isset($_GET['berhasil'])){
             echo "<p>".$_GET['berhasil']." Data DPT berhasil di Upload</p>";
           }
           ?>
           <form action="aksi_upload_dpt.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label style="color: white"><b>Format file xls</b></label>
              <input type="file" name="file_dpt" required="required" class="form-control-file">
            </div>
            <div class="form-group">
              <input type="submit" name="upload" class="btn btn-success" value="upload">
            </div>
          </form>

          <h3 style="color: white">Data DPT Belum memilih</h3>  
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="background-color: white">
              <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
              <?php
              $data_dpt = mysqli_query($koneksi,"SELECT * FROM tabel_dpt WHERE waktu='Belum memilih'");
              while($d = mysqli_fetch_array($data_dpt)){
                ?>
                <tr>
                  <td><?php echo $d['username']; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $d['nama']; ?></td>
                  <td><mark style="background-color: yellow;"><b><?php echo $d['status']; ?></b></mark></td>
                  <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_siswa.php?username=<?=$d['username']; ?>">Hapus</a>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12">
                  <h3 style="color: white">Data DPT sudah memilih</h3>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="background-color: white">
                      <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Waktu</th>
                      </tr>
                      <?php
                      $data_dpt = mysqli_query($koneksi,"SELECT * FROM tabel_dpt WHERE waktu='Sudah'");
                      while($d = mysqli_fetch_array($data_dpt)){
                        ?>
                        <tr>
                          <td><?php echo $d['username']; ?></td>
                          <td><?php echo $d['nama']; ?></td>
                          <td><mark style="background-color: #00cc00; color: white;"><b><?php echo $d['status']; ?></b></mark></td>
                          <td><?php echo $d['waktu']; ?></td>
                        </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>


          <div class="footer">
            <div class="row">
              <div class="col-lg-12" >
                &copy; Copyright SMKSP <?php echo date('Y') ?> <a href="http://binarytheme.com" style="color:#fff;" target="_blank"></a>
              </div>
            </div>
          </div>
          

          <!-- /. WRAPPER  -->
          <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
          <!-- JQUERY SCRIPTS -->
          <script src="assets/js/jquery-1.10.2.js"></script>
          <!-- BOOTSTRAP SCRIPTS -->
          <script src="assets/js/bootstrap.min.js"></script>
          <!-- CUSTOM SCRIPTS -->
          <script src="assets/js/custom.js"></script>




        </body>
        </html>