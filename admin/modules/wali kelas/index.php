<?php
if (!isset($_SESSION['admin-username']))
    header("location:../../login.php");
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
     // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
       "April", "Mei", "Juni",
       "Juli", "Agustus", "September",
       "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}
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
        <h3 class="page-header"><i class="fa fa-user fa-fw fa-2x"></i> Halaman Data Wali Kelas
            <form class="navbar-form navbar-right" method="POST" action="?admin=cari_kelas">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" name="cari" class="tultip form-control" placeholder="Cari Kelas..." required="" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Cari Berdasarkan NIP">
                </div>
            </form></h3>
            <div class="row-fluid placeholders">
                <div class="col-md-12 text-left">
                    <div class="col-md-12 text-left">
                        <p>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-edit fa-lg"></i> Tambah Data <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" data-toggle="modal" data-target="#Tambah"><i class="fa fa-bank fa-lg"></i> Data Wali Kelas</a></li>
                                </ul>
                            </div>
                            <br/>
                        </p>
                        <?php
                        if (isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                        } unset($_SESSION['alert']);
                        ?>
                        <?php
                        $per_hal = 10;
                        $jumlah_record = mysqli_query ($link,"SELECT * FROM tbl_walikelas");
        //$jum = mysql_result($jumlah_record,0);
                        $jmldata    = mysqli_num_rows($jumlah_record);
                        $halaman = ceil($jmldata/$per_hal);
                        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                        $start = ($page - 1) * $per_hal;

                        $sql_kelas = mysqli_query($link, "SELECT tbl_walikelas.id_kelas,tbl_kelas.id_kelas,tbl_kelas.kelas,tbl_guru.nip,
tbl_guru.nama_guru from tbl_kelas INNER JOIN tbl_walikelas ON tbl_kelas.id_kelas=tbl_walikelas.id_kelas
INNER JOIN tbl_guru ON tbl_walikelas.nip=tbl_guru.nip order by tbl_walikelas.nip asc LIMIT $start, $per_hal;");
                        $j = mysqli_num_rows($sql_kelas);
                        if ($j > 0) {
                            ?>
                            <div class="panel panel-primary">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><i class="fa fa fa-user  fa-fw fa-2x"></i> Data Kelas</div>
                                <table class="table table-striped table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th width="20%">Kelas</th>
                                            <th width="60%">Wali Kelas</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($data_kelas = mysqli_fetch_assoc($sql_kelas)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                
                                                <td><?php echo $data_kelas['kelas']; ?></a></td>
                                                
                                                <td><?php echo $data_kelas['nip']."  ".$data_kelas['nama_guru']; ?></td>
                                                <td>

                                                    <a href="#" class="edit-record" data-id="<?php echo $data_kelas['id_kelas'];?>" title="" data-original-title="">
                                                        <button type="button" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                                                    </a>
                                                    <a href="#" data-href="index.php?admin=del_kelas&id_kelas=<?php echo $data_kelas['id_kelas']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                                        <button type="button" class="btn btn-danger btn-flat btn-xs"><i class="glyphicon glyphicon-trash"></i></button>

                                                    </a>

                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            Belum Ada Data Wali Kelas Yang di Inputkan. . .
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <nav>
                                <ul class="pagination">

                                    <li class="disabled"><a href="?admin=dt_wali&page=<?php echo $page -1 ?>" aria-label="Previous"> <span aria-hidden="true">«</span></a></li>
                                </ul>
                                <?php 
                                for($x=1;$x<=$halaman;$x++)
                                {
                                    ?>
                                    <ul class="pagination">
                                        <li class="active"><a href="?admin=dt_wali&page=<?php echo $x ?>"><?php echo $x ?><span class="sr-only">(current)</span></a></li>
                                    </ul>
                                    <?php
                                }
                                ?>
                                <ul class="pagination">
                                    <li><a href="?admin=dt_wali&page=<?php echo $page +1 ?>" aria-label="Next"> <span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        </aside>

        <!-- Modal Tambah Alternatif-->
        <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil fa-fw fa-lg"></i> Tambah Data Wali Kelas</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="?admin=add_wali" >
                            <fieldset>
                                <div class="form-group">
                                   <label class="col-lg-3 control-label">Kelas</label>
                                   <div class="col-lg-8">
                                    <select name="id_kelas" id="id_kelas" multiple="multiple" style="width: 370px" class="form-control">
                                        <?php
                                        include "../../../config/config.php";
                                        $q = mysqli_query($link,"SELECT id_kelas, kelas from tbl_kelas group by kelas");
                                        while($r = mysqli_fetch_array($q)) {
                                            ?>
                                            <option value="<?php echo $r['id_kelas'] ?>">
                                                <?php echo $r['kelas'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="col-lg-3 control-label">Guru</label>
                               <div class="col-lg-8">
                                <select name="nip" id="nip" multiple="multiple" style="width: 370px" class="form-control">
                                    <?php
                                    include "../../../config/config.php";
                                    $q = mysqli_query($link,"SELECT nip, nama_guru from tbl_guru");
                                    while($r = mysqli_fetch_array($q)) {
                                        ?>
                                        <option value="<?php echo $r['nip'] ?>">
                                            <?php echo $r['nip']." ".$r['nama_guru'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>






                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i> Keluar</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="tambah"><i class="fa fa-save fa-fw fa-lg"></i> Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle fa-fw fa-lg"></i>Konfirmasi Hapus</h4>
                </div> -->
                
                <div class="modal-body">
                    <h3 align="center"><i class="fa  fa-times-circle-o fa-fw fa-4x"></i></h3>
                    <h4 align="center"><strong><p>Yakin Hapus Data ini.??</p></strong></h4>
                    <!--  <p class="debug-url"></p> -->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i>Batal</button>
                    <a class="btn btn-danger btn-ok" >Ya, Hapus <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil fa-fw fa-lg"></i> Ubah Data Wali Kelas</h4>
                </div>
                <div class="modal-body">

                </div>
                
                
                
            </div>
        </div>
    </div>

    <script src="http://127.0.0.1/e-raport/admin/js/select2.js" type="text/javascript"></script>
    <script src="http://127.0.0.1/e-raport/admin/js/select2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#id_kelas").select2({
                placeholder: 'Pilih Kelas',
                allowClear: true
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#nip").select2({
                placeholder: 'Pilih Guru',
                allowClear: true
            });
        });
    </script>

    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
    <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myEdit").modal('show');
                $.post('modules/wali kelas/hasil.php',
                    {id_kelas:$(this).attr('data-id')},

                    function(html){
                        $(".modal-body").html(html);
                    }   
                    );
            });
        });
        
    </script>