<?php
if (!isset($_SESSION['admin-siswa'])and ! isset($_SESSION['login-siswa'])) {
    header("location:../");
}
?>
<h3 class="page-header"><i class="fa fa-cog fa-spin fa-fw fa-2x"></i> Pengaturan</h3>
<div class="row-fluid placeholders">
    <?php
    if (isset($_SESSION['info-login'])) {
        echo $_SESSION['info-login'];
    }
    unset($_SESSION['info-login']);
    ?>
    <div class="col-md-5 text-left">
        <?php
        $query = "SELECT akun.username,akun.email,akun.password,tbl_siswa.nis,tbl_siswa.nama_lengkap,
        tbl_siswa.jk FROM akun,tbl_siswa
        where tbl_siswa.nis=akun.nis and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "'";
        $hasil = mysqli_query($link, $query);
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-thumb-tack fa-lg"></span> Informasi Siswa</h3>
            </div>
            <div class="panel-body">
                <div class="thumbnail">
                    <?php
                    $data = mysqli_fetch_array($hasil);
                    ?>
                    <img alt="Graduate" src="../style/img/<?php echo ($data['jk'] == 'L') ? "male.png" : "female.png"; ?>" style="width: 120px; height: 120px;" class="img-responsive">
                    <div class="caption">
                        <p><h4><span class="fa fa-child fa-lg"></span> <?php echo $data['nama_lengkap']; ?></h4></p>
                        <p><span class="fa fa-check-square-o fa-lg"></span> <b>NIS</b> : <?php echo $data['nis']; ?></p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-left">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-unlock fa-lg"></span> Informasi Akun</h3>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-responsive">
                    <tr>
                        <td><span class="fa fa-envelope fa-lg"></span> <b>Email Siswa</b></td>
                        <td>:</td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr
                    <td><span class="fa fa-user fa-lg"></span> <b>Username</b></td>
                    <td>:</td>
                    <td><?php echo $data['username']; ?></td>
                </tr>
                <tr>
                    <td><span class="fa fa-code fa-lg"></span> <b>Password</b></td>
                    <td>:</td>
                    <td>
                        <?php echo $data['password']; ?>&nbsp;
                        <a class="tultip btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahPass" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Ubah Password Anda"><span class="fa fa-refresh fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="ubahPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i> Ubah Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="?siswa=ubah_password">
                    <fieldset>
                        <div class="form-group">
                            <label for="inputNim" class="col-lg-4 control-label">Password Lama</label>
                            <div class="col-lg-7">
                                <input class="form-control" id="inputNim" type="password" name="pass_lama" placeholder="Ketikkan Password Lama Anda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNim" class="col-lg-4 control-label">Password Baru</label>
                            <div class="col-lg-7">
                                <input class="form-control" id="inputNim" type="password" name="pass_baru" placeholder="Ketikkan Password Baru Anda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNim" class="col-lg-4 control-label">Ulangi Password Baru</label>
                            <div class="col-lg-7">
                                <input class="form-control" id="inputNim" type="password" name="ulangi_pass" placeholder="Ulangi Password Baru Anda">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar <i class="fa fa-times fa-fw fa-lg"></i></button>
                        <button type="submit" class="btn btn-success" name="ubah_p">Ubah Password <i class="fa fa-refresh fa-fw fa-lg"></i></button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    </div><!-- /.modal -->