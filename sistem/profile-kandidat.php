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
                    <h2> profil kandidat ketua dan wakil ketua osis</h2>
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
                                            <p><b>Calon Ketua <?=$ind ?></b></p>
                                        </div>
                                        <div class="col-xs-6 col-md-9">
                                            <h3>Kandidat <?= $ind ?></h3>
                                            <h4>Visi Misi</h4>
                                            <br><br>
                                            <h3>Data Diri</h3>
                                            <table>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><?= $data['nm_paslon_ketua'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                <!-- wakil ketua -->
                                    <div class="row">
                                        <br>
                                        <div class="col-xs-12 col-md-3 text-center">
                                            <img height="150" width="100" src="foto/<?= $data['gambar1'] ?>"></img>
                                            <p><b>Calon Wakil Ketua <?=$ind ?></b></p>
                                        </div>
                                        <div class="col-xs-6 col-md-9">
                                            <h3>Data Diri</h3>
                                            <table>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><?= $data['nm_paslon_wakil'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php $ind++;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>