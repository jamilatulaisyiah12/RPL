
          <div class="row">
            <div class="col-lg-12">
             <div class="alert alert-success">
              <div class="row">
                <div class="col-lg-12">
                  <h2 align="center"><b>PASLON</b></h2><br>
                  <form action="" method="post">
                    <?php
                    $data_paslon = mysqli_query($koneksi,"SELECT * FROM data_paslon");
                    while($d = mysqli_fetch_array($data_paslon)){
                      ?>
                      <div class="col-lg-6">
                        <table class="table table-striped table-bordered table-hover">
                          <tr>
                            <td colspan="2" style=" color: white; font-size: 50px; text-align: center;"><b><?php echo $d['no_urut']; ?></b>
                            </td>
                          </tr>
                          <tr>
                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar1']; ?>"></td>
                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar2']; ?>"></td>
                          </tr>
                          <tr>
                            <td align="center"><h2><?php echo $d['nm_paslon_ketua']; ?></h2></td>
                            <td align="center"><h2><?php echo $d['nm_paslon_wakil']; ?></h2></td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: center; padding: 20px; background-color: gray;"><input type="radio" required="required" name="nomor_paslon" value="<?php echo $d['no_urut']; ?>"></td>
                          </tr>
                        </table>
                      </div>
                    <?php } ?>
                    <input style="color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;" type="submit" name="simpan" value="Vote" class="btn btn-success" onclick="return confirm('YAKIN DENGAN PILIHAN ANDA')">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-lg-12 ">
            <div class="alert alert-danger" style="text-align: center;">
              <strong>Voting cuma bisa dilakukan satu kali !!! </strong> 
            </div>
          </div>
        </div>
        <!-- /. ROW  --> 
      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>












  if(isset($_POST['simpan'])) {
  date_default_timezone_set('Asia/jakarta');
  $waktu = date('H:i:sa');
  $nim = $_SESSION['nim'];
  $kode_akses= $_SESSION['kode_akses'];
  $nomor_paslon =$_POST['nomor_paslon'];

  $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_paslon WHERE kode_akses='$kode_akses'"));
  if ($cek > 0){
    echo"<script>window.alert('Anda tidak bisa melakukan voting lagi')
          window.location='index.php'</script>";
        }else {
          mysqli_query($koneksi, "UPDATE tbl_dpt SET status='(Sudah Memilih)', waktu='$waktu' WHERE nim='$nim'");
          mysqli_query($koneksi,"INSERT INTO tbl_paslon(kode_akses, nomor_paslon)
            VALUES ('$kode_akses','$nomor_paslon')");

          echo"<script>window.alert('Voting Berhasil')
          window.location='index.php'</script>";
        }
      }