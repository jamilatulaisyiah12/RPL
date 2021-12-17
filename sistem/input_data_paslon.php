<?php
// session_start();
if (!isset($_SESSION["login"])) {
  header("location:../index.php");
  exit;
}
include '../koneksi.php';

if (isset($_POST['simpan'])) {
  $nim_ketua = mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
  $nm_paslon_ketua = mysqli_real_escape_string($koneksi, $_POST['nm_paslon_ketua']);
  $ttl_ketua =  mysqli_real_escape_string($koneksi, $_POST['ttl_ketua']);
  $jk_ketua =  mysqli_real_escape_string($koneksi, $_POST['jk_ketua']);
  $kls_ketua =  mysqli_real_escape_string($koneksi, $_POST['kls_ketua']);
  $visimisi =  mysqli_real_escape_string($koneksi, $_POST['visimisi']);
  // $misi =  mysqli_real_escape_string($koneksi, $_POST['misi']);
  
  
  $nim_wakil = mysqli_real_escape_string($koneksi, $_POST['nim_wakil']);
  $nm_paslon_wakil = mysqli_real_escape_string($koneksi, $_POST['nm_paslon_wakil']);
  $ttl_wakil =  mysqli_real_escape_string($koneksi, $_POST['ttl_wakil']);
  $jk_wakil =  mysqli_real_escape_string($koneksi, $_POST['jk_wakil']);
  $kls_wakil =  mysqli_real_escape_string($koneksi, $_POST['kls_wakil']);

  $no_urut = mysqli_real_escape_string($koneksi, $_POST['no_urut']);

  if ($_POST['simpan']) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'JPG');
    $gambar1 = $_FILES['gambar1']['name'];
    $x = explode('.', $gambar1);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar1']['size'];
    $file_tmp = $_FILES['gambar1']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if ($ukuran <= 2000000) {
        move_uploaded_file($file_tmp, 'foto/' . $gambar1);
        $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar1')");
        // $gambar2 = $_FILES['gambar2']['name'];
        // $x = explode('.', $gambar2);
        // $ekstensi = strtolower(end($x));
        // $ukuran = $_FILES['gambar2']['size'];
        // $file_tmp = $_FILES['gambar2']['tmp_name'];
        // if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        //   if ($ukuran <= 2000000) {
        //     move_uploaded_file($file_tmp, 'foto/' . $gambar2);
        //     $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar2')");
        //   }
        // }
      }
    }
  }

  mysqli_query($koneksi, "INSERT INTO data_paslon(id, nim_ketua, nm_paslon_ketua, gambar1, nim_wakil, nm_paslon_wakil, no_urut, visimisi)
    VALUES ('','$nim_ketua','$nm_paslon_ketua','$gambar1','$nim_wakil','$nm_paslon_wakil','$no_urut', '$visimisi')");
    // echo "INSERT INTO data_paslon(id, nim_ketua, nm_paslon_ketua, gambar1, nim_wakil, nm_paslon_wakil, no_urut, visimisi)
    // VALUES ('','$nim_ketua','$nm_paslon_ketua','$gambar1','$nim_wakil','$nm_paslon_wakil','$no_urut', '$visimisi')";
    // die();
    mysqli_query($koneksi, "INSERT INTO data_siswa(NIS, Nama_siswa, jenis_kelamin, Kelas, Tgl_lahir) VALUES ('$nim_ketua', '$nm_paslon_ketua', '$jk_ketua', '$kls_ketua', '$ttl_ketua')");
    mysqli_query($koneksi, "INSERT INTO data_siswa(NIS, Nama_siswa, jenis_kelamin, Kelas, Tgl_lahir) VALUES ('$nim_wakil', '$nm_paslon_wakil', '$jk_wakil', '$kls_wakil', '$ttl_wakil')");
    mysqli_query($koneksi, "INSERT INTO tabel_dpt(username, nama, status, waktu) VALUES ('$nim_ketua', '$nm_paslon_ketua', 'Pemilih', 'Belum memilih')");
    mysqli_query($koneksi, "INSERT INTO tabel_dpt(username, nama, status, waktu) VALUES ('$nim_wakil', '$nm_paslon_wakil', 'Pemilih', 'Belum memilih')");

  // echo "<script>window.alert('Berhasil')
  // window.location='input_data_paslon.php'</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body>


  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-lg-12">
          <h2 style="color: white"><i class="fa fa-user"> Input data paslon</i></h2>
        </div>
      </div>
      <!-- /. ROW  -->

      <div class="row">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Input Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Data Paslon</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>NIM Calon</label>
                    <input type="text" name="nim_ketua" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Calon</label>
                    <input type="text" name="nm_paslon_ketua" required="required" autocomplete="off" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>TTL</label>
                    <input type="text" name="ttl_ketua" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk_ketua" >
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kls_ketua" required="required" autocomplete="off" class="form-control">
                  </div>

                  
                  <div class="form-group">
                    <label>NIM wakil</label>
                    <input type="text" name="nim_wakil" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama wakil</label>
                    <input type="text" name="nm_paslon_wakil" required="required" autocomplete="off" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>TTL</label>
                    <input type="text" name="ttl_wakil" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk_wakil" >
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kls_wakil" required="required" autocomplete="off" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label>Foto Paslon</label>
                    <input type="file" name="gambar1" required="required" class="form-control-file">
                  </div>
                  <div class="form-group">
                    <label>No paslon</label>
                    <input type="text" name="no_urut" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Visi Misi</label>
                    <!-- <input type="text" name="no_urut" required="required" class="form-control"> -->
                    <textarea name="visimisi" cols="50" require></textarea>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" name="simpan" value="Input" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2 style="color: white">Data paslon</h2>
              <div class="table-responsiv">
                <table class="table table-striped table-bordered table-hover" style="background-color: white">
                  <tr>
                    <th>Nama</th>
                    <th>No paslon</th>
                    <th>Opsi</th>
                  </tr>
                  <?php
                  $data_paslon = mysqli_query($koneksi, "SELECT * FROM data_paslon");
                  while ($d = mysqli_fetch_array($data_paslon)) {
                  ?>
                    <tr>
                      <td><?php echo $d['nm_paslon_ketua']; ?></td>
                      <td><?php echo $d['no_urut']; ?></td>
                      <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus.php?no_urut=<?php echo $d['no_urut']; ?>">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
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