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
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="alert alert-info">
                            <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                    <!-- <img src="https://picsum.photos/100/100" alt=""> -->
                                    </div>
                                    <div class="col-xs-6 col-md-9">
                                        dfdf
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>