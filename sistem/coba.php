<div id="page-wrapper" >
    <div id="page-inner">
      <div class="row">
        <div class="col-lg-12">
          <h2><i class="fa fa-user"> Input data paslon</i></h2>   
        </div>
      </div>              
      <!-- /. ROW  -->

      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>NIM Calon CAGUB</label>
              <input type="text" name="nim_ketua" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Calon WAGUB</label>
              <input type="text" name="nm_paslon_ketua" required="required" autocomplete="off" class="form-control">
            </div>
            <div class="form-group">
              <label>foto ketua</label>
              <input type="file" name="gambar1" required="required" class="form-control-file">
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
              <label>foto wakil</label>
              <input type="file" name="gambar2" required="required" class="form-control-file">
            </div>
            <div class="form-group">
              <label>No paslon</label>
              <input type="text" name="no_urut" required="required" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="simpan" value="Input" class="form-control">
            </div>
          </form>
        </div>

        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>Data paslon</h2>  
              <div class="table-responsiv">
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Nama</th>
                    <th>No paslon</th>
                    <th>Opsi</th>
                  </tr>
                  <?php
                  $data_paslon = mysqli_query($koneksi,"SELECT * FROM data_paslon");
                  while($d = mysqli_fetch_array($data_paslon)){
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