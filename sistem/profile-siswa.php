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
                    <h2> Pemilihan Ketua dan wakil ketua osisi</h2>
                    <h2> smk siding puri</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="alert alert-info">
                                <table class="table">
                                    <tr>
                                        <td colspan="2">Profil siswa</td>
                                    </tr>
                                    <?php
                                    $dataServ = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE NIS='$_SESSION[username]'");
                                    // $data = mysqli_fetch_array($dataServ);
                                    while ($data = mysqli_fetch_array($dataServ) ) {?>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?=$data['Nama_siswa'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>TTL</td>
                                            <td><?=$data['Tgl_lahir'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?=$data['jenis_kelamin'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td><?=$data['NIS'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>KELAS</td>
                                            <td><?=$data['Kelas'] ?> </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>