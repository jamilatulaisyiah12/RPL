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
                    <div >
                    <div class="row">
                        <?php
                        $dataTemp = mysqli_query($koneksi, "SELECT * FROM data_paslon");
                        $ind = 1;
                        $breaker = 0;
                        while ($data = mysqli_fetch_array($dataTemp)) {
                            if ($breaker != 2) {
                        ?>
                        
                            <div class="col-lg-5 bg-info">
                                <h3>Kandidat <?=$ind ?></h3>
                                <div class="">
                                    <img src="foto/<?=$data['gambar1']?>" alt="">
                                </div>
                                <a class="btn btn-info" href="simpansuara.php?iddpt=<?=$_SESSION['username']?>&idpaslon=<?=$data['no_urut']?>">PILIH</a>
                            </div>
                            <div class="col-lg-1"></div>
                        <?php }else{?>

                            </div>
                            <br><br>
                            <div class="row">
                            <div class="col-lg-5 bg-info ">
                                <h3>Kandidat <?=$ind ?></h3>
                                <div class=""><?=$data['nm_paslon_ketua'] ?></div>
                                <a class="btn" href="">PILIH</a>
                            </div>
                            <div class="col-lg-1"></div>
                            <?php $breaker = 0; } ?>

                        <?php $ind++; $breaker++; }?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>