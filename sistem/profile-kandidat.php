<?php
if (!isset($_SESSION["login"])) {
    header("location:../index.php");
    exit;
}
include '../koneksi.php';

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2> Profil Kandidat Ketua dan Wakil Ketua OSIS SMK SIDINGPURI </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $dataTemp = mysqli_query($koneksi, "SELECT * FROM data_paslon");
                    $ind = 1;
                    while ($data = mysqli_fetch_array($dataTemp)) {
                    ?>
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="alert alert-info">

                                <!-- data ketua -->
                                    <div class="row">
                                        <div class="col-xs-12 col-md-3 text-center">
                                            <img height="150" width="100" src="foto/<?= $data['gambar1'] ?>"></img>
                                            <p><b>Calon Ketua dan Wakil <?=$ind ?></b></p>
                                        </div>
                                        <div class="col-xs-6 col-md-9">
                                            <h3>Kandidat <?= $ind ?></h3>
                                            <p><?=$data['visimisi']?></p>
                                            
                                            <br><br>
                                            <h3>Data Calon Ketua</h3>
                                            <table>
                                                <?php
                                                $dataTemp = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE NIS='$data[nim_ketua]'");
                                                // echo "SELECT * FROM data_siswa WHERE NIS='$data[nim_ketua]'";
                                                // die();
                                                $dataKetua = mysqli_fetch_array($dataTemp);
                                                ?>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><?= $dataKetua['Nama_siswa'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NIS</td>
                                                    <td>:</td>
                                                    <td><?= $dataKetua['NIS'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>TTL</td>
                                                    <td>:</td>
                                                    <td><?= $dataKetua['Tgl_lahir'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td><?= $dataKetua['jenis_kelamin'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td><?= $dataKetua['Kelas'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                <!-- wakil ketua -->
                                    <div class="row">
                                        <br>
                                        <div class="col-xs-12 col-md-3 text-center">
                                        </div>
                                        <div class="col-xs-6 col-md-9">
                                            <h3>Data Wakil Ketua</h3>
                                            <table>
                                                <?php
                                                $dataTemp = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE NIS='$data[nim_wakil]'");
                                                $dataWakil = mysqli_fetch_array($dataTemp);
                                                ?>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><?= $dataWakil['Nama_siswa'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NIS</td>
                                                    <td>:</td>
                                                    <td><?= $dataWakil['NIS'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>TTL</td>
                                                    <td>:</td>
                                                    <td><?= $dataWakil['Tgl_lahir'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td><?= $dataWakil['jenis_kelamin'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td><?= $dataWakil['Kelas'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php $ind++;} ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>