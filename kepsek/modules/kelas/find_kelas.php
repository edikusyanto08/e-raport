<?php
if (!isset($_SESSION['admin-username'])) {
    header("location:login.php");

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cari = antiinjection($_POST['cari']);
    $sql_laporan = mysqli_query($link, "SELECT tbl_kelas.kd_kelas,tbl_kelas.kelas,tbl_siswa.nis,tbl_siswa.nama_lengkap
                     from tbl_kelas INNER JOIN tbl_siswa ON tbl_kelas.nis=tbl_siswa.nis where kelas  LIKE '%" . $cari . "%'
					order by tbl_kelas.kelas");
    
    ?>
    <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Raport Online SMPN 1 Mataram | 
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
    <h3 class="page-header"><i class="fa fa-bank fa-fw fa-2x"></i> Halaman Pencarian Data Kelas
        <!-- <form class="navbar-form navbar-right" method="POST" action="?admin=cari_guru">
            <img src="../style/img/search-ico.png" alt="search-ico" width="45px" height="45px"> <input type="text" name="cari" class="form-control" placeholder="Cari Guru..." required="">
        </form> -->
    </h3>
    <div class="row-fluid placeholders">
        <div class="col-md-12 text-left">
            <?php
            $hsl = mysqli_num_rows($sql_laporan);
            if ($hsl > 0) {
                $no = 1;
                ?>
                <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Berhasil!</h4>
                    <p>Hasil Pencarian : <big><strong><?php echo $hsl; ?></strong></big> Data Ditemukan.</p>
                    <p>
                        <a type="button" class="btn btn-warning" href="?admin=dt_kelas"><i class="fa fa-backward"></i> Kembali Ke Menu Kelas</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Pencarian Baru</button>
                    </p>
                </div>
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><i class="fa fa-bank fa-fw fa-2x"></i> Data Kelas</div>
                     <div class="panel-body">
                        <table id="example1" class="table table-bordered table-striped">
                       <thead>
                        <tr>
                            <th width="2">#</th>
                            <th width="10">Kode Kelas</th>
                            <th width="20%">Kelas</th>
                            <th width="30%">Siswa</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            while ($data_kelas = mysqli_fetch_assoc($sql_laporan)) {
                                ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data_kelas['kd_kelas']; ?></a></td>
                                <td><?php echo $data_kelas['kelas']; ?></td>
                                 <td><?php echo $data_kelas['nis']."  ".$data_kelas['nama_lengkap']; ?></td>
                                
                            </tr>
                                <?php
                                $no++;
                            }
                        } else {
                            // Data Mahasiswa Tidak Ditemukan. . .
                            ?>
                        <div class="alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>Mohon Maaf!</h4>
                            <p>Data yang Anda Cari Tidak Ada.</p>
                            <p>
                                <a type="button" class="btn btn-danger" href="?admin=dt_kelas"><i class="fa fa-backward"></i> Kembali Ke Menu Lihat Kelas</a>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Ulangi Pencarian</button>
                            </p>
                        </div>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            //jika tidak melaliu POST
            ?>
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Mohon Maaf!</h4>
                <p>Anda Belum Menginputkan Data Pencarian.</p>
                <p>
                    <a type="button" class="btn btn-warning" href="?admin=dt_kelas"><i class="fa fa-backward"></i> Kembali Ke Menu Lihat Laporan</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Ulangi Pencarian</button>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</section>
</aside>

 <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
                    <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
                    <!-- AdminLTE App -->
                    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
                    
                    <!-- AdminLTE for demo purposes -->

                    <!-- page script -->
                   <script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="CariLagi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pencarian Data kelas</h4>
            </div>
            <div class="modal-body">
                Isi Data Pencarian : <form class="navbar-form" method="POST" action="?admin=cari_kelas">
                    <img src="../style/img/search-ico.png" alt="search-ico" width="45px" height="45px"> 
                    <input type="text" class="tultip form-control" name="cari" placeholder="Cari Kelas..." required="" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Cari Berdasarkan NIP">
                </form>
            </div>
            <div class="modal-footer text-left">
                <i>Cari Data Berdasarkan Nama Kelas . .</i>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->