<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Penilaian Kegiatan Ekstrakurikuler</title>
        <meta name="description" content="The plugin will detect your mouse wheel and swipe gestures to determine which way the page should scroll." />
        <meta name="keywords" content="ekstrakurikuler, kegiatan ekskul mahasiswa, stmik bumigora, mataram" />
        <meta name="author" content="kemahasiswaan stmik bumigora mataram" />
        <!-- Bootstrap core CSS -->
        <link href="style/super-hero/bootstrap.css" rel="stylesheet">
        <!-- CSS Pagescroll-->
        <link rel="stylesheet" type="text/css" href="style/super-hero/onepage-scroll.css" />
        <link rel="stylesheet" href="style/super-hero/style.css">
        <!-- Custom styles for font-awesome -->
        <link rel="stylesheet" href="style/font-awesome-4.1.0/css/font-awesome.min.css">
        <!-- favicon STMIK -->
        <link rel="shortcut icon" href="style/ico/stmik.png">
        <!-- Custom js for page-scroll -->
        <script type="text/javascript" src="style/super-hero/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="style/super-hero/js/jquery.onepage-scroll.js"></script>
    </head>
    <body>

        <header>
            <img src="style/img/logo-stmik.png" alt="logo STMIK Bumigora" width="100" height="100">
            <h1><a href="#">Penilaian Kegiatan Ekstrakurikuler Mahasiswa</a></h1>
            <small>STMIK Bumigora Mataram</small>
            <a class="tultip btn btn-info" href="admin/" data-placement="left" title="" data-toggle="tooltip" data-original-title="Login Administrator" style="position:absolute; right:30px;margin-top:-20px;"><img src="style/img/admin.png" alt="logo STMIK Bumigora" width="30" height="30"></a>
            <img src="style/img/toga1.png" alt="toga" width="80" height="78" style="position:absolute; left:150px;margin-top:-19px;">
        </header>
        <div class="main">

            <section class="page one">
                <div class="page-container">
                    <div class="row">
                        <?php
                        include "config/config.php";
                        if (isset($_GET['akun'])) {
                            $a_akun = antiinjection($_GET['akun']);
                            $a_token = antiinjection($_GET['token']);
                            $aktif = mysqli_query($link, "UPDATE akun set status = 1 where username='$a_akun' and 
							`password` = '$a_token'");
							if ($aktif){
                            ?>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-check-square-o fa-lg"></i> Verifikasi Sukses . . .</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Akun Anda Berhasil di aktifkan, Silahkan lakukan proses Login Kembali.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="index.php"><button type="button" class="btn btn-primary">Login &nbsp;<big><i class="fa fa-sign-in fa-lg"></i></big></button></a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                            <?php
                        } else {
                            ?>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-times fa-lg"></i> Verifikasi Gagal . . .</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Mohon Maaf. Akun Anda Gagal di aktifkan, Silahkan Hubungi Bagian Kemahasiswaan untuk Layanan Pengaktifan Akun.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="index.php"><button type="button" class="btn btn-primary">Kembali &nbsp;<big><i class="fa fa-sign-in fa-lg"></i></big></button></a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                            <?php
                        }
						}
                        ?>
                    </div>
                    <div style="position:absolute;bottom:-170px;float:left;">
                        <footer>
                            <p style="width:100%;color:#4e5d6c;">
                                Copyright &COPY 2014 <b>STMIK Bumigora Mataram</b> <i class="fa fa-university fa-fw fa-lg"></i><br/>
                                Created By : <b><i>Rahmat Hidayat</i> & <i>Sapri</i></b> <i class="fa fa-graduation-cap fa-fw fa-lg"></i>
                            </p>
                        </footer>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript">
            $(".main").onepage_scroll({
                sectionContainer: "section",
                easing: "cubic-bezier(0.180, 0.900, 0.410, 1.210)"
            });
        </script>
        <script type="text/javascript" src="style/super-hero/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            (function() {
                $('.tultip').tooltip();
                $('#pesan').fadeOut(7000);
            })();
        </script>
    </body>
</html>