<?php
if (!isset($_GET['id'])) {
    echo "&nbsp";
} else {
    $id_data = $cipher->decrypt($_GET['id'], $kunci);
    $u_notif = mysqli_query($link, "update penilaian set tandai='1' where id_data='" . $id_data . "'");
}
?>
<h3 class="page-header"><i class="fa fa-list-ol fa-fw fa-2x"></i> Informasi Penilaian Hasil Belajar Siswa</h3>
<div class="row-fluid placeholders">
    <div class="col-md-10 text-left">
        <!--        <legend>
                    <h4>Laporan Detail Kegiatan Mahasiswa</h4>
                </legend>-->
                <?php
                $dt_mhs = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_siswa.nama_lengkap,
                    tbl_kelas.kelas,rapot.thn_ajaran,rapot.semester FROM tbl_siswa,tbl_kelas,rapot
                    where tbl_siswa.nis=tbl_kelas.nis and tbl_siswa.nis=rapot.nis and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "'");
                $i_m = mysqli_fetch_array($dt_mhs);
                ?>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Nama Sekolah</td>
                                <td width="1%">:</td>
                                <td><strong><big>SMPN 1 Mataram</big></strong></td>
                            </tr>
                            <tr>
                                <td width="20%">Alamat</td>
                                <td width="1%">:</td>
                                <td><strong><big>Jl.Pejanggik No 3 Mataram</big></strong></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><strong><big><?php echo $i_m['nama_lengkap']; ?></big></strong></td>
                            </tr>




                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <td>Nomor Induk</td>
                                <td>:</td>
                                <td><strong><big><?php echo $i_m['nis']; ?></big></strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><strong><big><?php //echo $i_m['kelas']; ?></big></strong></td>
                            </tr> -->

                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td><strong><big><?php echo $i_m['thn_ajaran']; ?></big></strong></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Nilai Hasil Belajar</div>
                    <div class="tabs-x tabs-above tab-align-left tab-bordered">
                     <ul id="w1" class="nav nav-tabs" role="tablist">

                         <li class="active"><a href="#in" data-toggle="tab" aria-expanded="false">VII Semester I</a></li>
                         <li class=""><a href="#blm" data-toggle="tab" aria-expanded="true">VII Semester II <label class="label label-info"><?php //echo $c ?></label></a></li>
                         <li class=""><a href="#viii" data-toggle="tab" aria-expanded="true">VIII Semester I</a></li>
                         <li class=""><a href="#viiib" data-toggle="tab" aria-expanded="true"> VIII Semester II<label class="label label-info"><?php //echo $c ?></label></a></li>                 
                         <li class=""><a href="#ix" data-toggle="tab" aria-expanded="true">IX Semester I</a></li>
                         <li class=""><a href="#ixb" data-toggle="tab" aria-expanded="true">IX Semester II<label class="label label-info"><?php //echo $c ?></label></a></li>
                     </ul>
                     <div class="tab-content no-padding">

                        <div class="tab-pane active" id="in" >
                            <div class="box-body table-responsive" id="data-mahasiswa">

                                <table id="example2" class="table table-bordered table-striped">
                                    <?php
                                    $no = 1;
                                    $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                        rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                        where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_kelas.id_kelas=rapot.id_kelas and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "'
                                        and rapot.semester='Ganjil' and tbl_kelas.kd_kelas='VII' order by rapot.nilai;");
                                    $jml_lap = mysqli_num_rows($sql_laporan);
                                    if ($jml_lap > 0) {
                                        ?>
                                        <table id="example2" class="table table-bordered table-hover">

                                            <thead>
                                               <tr class="">
                                                   <th rowspan="2" width="5%">No</th>
                                                   <th rowspan="2" width="20%">Mata Pelajaran</th>
                                                   <th rowspan="2" width="5%">KKM*)</th>
                                                   <th colspan="2" width="35%" align="center">Nilai</th>

                                                   <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                               </tr>
                                               <tr class="">
                                                <th rowspan="2" >Angka</th>
                                                <th rowspan="2" >Huruf</th>
                                                <!-- <th align="center">Registrasi</th> -->
                                            </tr> 


                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                                $kelas=$data_mhs['kelas'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                    <td><?php echo $data_mhs['kkm']; ?></td>
                                                    <td><?php echo $data_mhs['nilai']; ?></td>
                                                    <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                    <td><?php echo $data_mhs['deskripsi']; ?></td>


                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                            <tr>
                                                <?php
                                                $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                    tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                    FROM rapot,tbl_kelas
                                                    WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                    and rapot.semester='Ganjil' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                                $total_nilai = mysqli_fetch_array($query_total);
                                                $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                                ?>
                                                <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                                <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="alert alert-dismissable alert-info">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Semester ini belum di masukkan.</small>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table> 
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <div class="panel panel-info">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading"><i class="fa  fa-list-alt fa-fw fa-2x"></i> Kegiatan Ektrakurikuler Siswa </div>
                                            <!-- <div id='container'></div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <div class="panel panel-info">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading"><i class="fa   fa-book fa-fw fa-2x"></i> Akhlak dan Kepribadian Siswa</div>
                                            <!-- <div id='container'></div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <div class="panel panel-info">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading"><i class="fa  fa-file-text fa-fw fa-2x"></i> Ketidak Hadiran Siswa</div>
                                            <!-- <div id='container'></div> -->
                                        </div>
                                    </div>


                                </div> 

                            </div>
                        </div>




                        <div class="tab-pane" id="blm">


                            <table id="example2" class="table table-bordered table-striped">
                                <?php
                                $no = 1;
                                $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                    rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                    where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_kelas.id_kelas=rapot.id_kelas and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "'
                                    and rapot.semester='Genap' and tbl_kelas.kd_kelas='VII' order by rapot.nilai;");
                                $jml_lap = mysqli_num_rows($sql_laporan);
                                if ($jml_lap > 0) {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                           <tr class="">
                                               <th rowspan="2" width="5%">No</th>
                                               <th rowspan="2" width="20%">Mata Pelajaran</th>
                                               <th rowspan="2" width="5%">KKM*)</th>
                                               <th colspan="2" width="35%">Nilai</th>

                                               <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                           </tr>
                                           <tr class="">
                                            <th rowspan="2" align="center">Angka</th>
                                            <th rowspan="2" align="center">Huruf</th>
                                            <!-- <th align="center">Registrasi</th> -->
                                        </tr> 


                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                            $kelas=$data_mhs['kelas'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                <td><?php echo $data_mhs['kkm']; ?></td>
                                                <td><?php echo $data_mhs['nilai']; ?></td>
                                                <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                <td><?php echo $data_mhs['deskripsi']; ?></td>


                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                FROM rapot,tbl_kelas
                                                WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                and rapot.semester='Genap' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                            $total_nilai = mysqli_fetch_array($query_total);
                                            $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                            ?>
                                            <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                            <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Semester ini belum dimasukkan.</small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="viii">


                            <table id="example2" class="table table-bordered table-striped">
                                <?php
                                $no = 1;
                                $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                    rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                    where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_kelas.id_kelas=rapot.id_kelas and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "' 
                                    and rapot.semester='Ganjil' and tbl_kelas.kd_kelas='VIII' order by rapot.nilai;");
                                $jml_lap = mysqli_num_rows($sql_laporan);
                                if ($jml_lap > 0) {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                           <tr class="">
                                               <th rowspan="2" width="5%">No</th>
                                               <th rowspan="2" width="20%">Mata Pelajaran</th>
                                               <th rowspan="2" width="5%">KKM*)</th>
                                               <th colspan="2" width="35%">Nilai</th>

                                               <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                           </tr>
                                           <tr class="">
                                            <th rowspan="2" align="center">Angka</th>
                                            <th rowspan="2" align="center">Huruf</th>
                                            <!-- <th align="center">Registrasi</th> -->
                                        </tr> 


                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                            $kelas=$data_mhs['kelas'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                <td><?php echo $data_mhs['kkm']; ?></td>
                                                <td><?php echo $data_mhs['nilai']; ?></td>
                                                <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                <td><?php echo $data_mhs['deskripsi']; ?></td>


                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                FROM rapot,tbl_kelas
                                                WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                and rapot.semester='Ganjil' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                            $total_nilai = mysqli_fetch_array($query_total);
                                            $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                            ?>
                                            <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                            <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Semester ini belum di masukkan.</small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="viiib">


                            <table id="example2" class="table table-bordered table-striped">
                                <?php
                                $no = 1;
                                $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                    rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                    where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_kelas.id_kelas=rapot.id_kelas and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "'
                                    and rapot.semester='Genap' and tbl_kelas.kd_kelas='VIII' order by rapot.nilai;");
                                $jml_lap = mysqli_num_rows($sql_laporan);
                                if ($jml_lap > 0) {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                           <tr class="">
                                               <th rowspan="2" width="5%">No</th>
                                               <th rowspan="2" width="20%">Mata Pelajaran</th>
                                               <th rowspan="2" width="5%">KKM*)</th>
                                               <th colspan="2" width="35%">Nilai</th>

                                               <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                           </tr>
                                           <tr class="">
                                            <th rowspan="2" align="center">Angka</th>
                                            <th rowspan="2" align="center">Huruf</th>
                                            <!-- <th align="center">Registrasi</th> -->
                                        </tr> 


                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                            $kelas=$data_mhs['kelas'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                <td><?php echo $data_mhs['kkm']; ?></td>
                                                <td><?php echo $data_mhs['nilai']; ?></td>
                                                <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                <td><?php echo $data_mhs['deskripsi']; ?></td>


                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                FROM rapot,tbl_kelas
                                                WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                and rapot.semester='Genap' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                            $total_nilai = mysqli_fetch_array($query_total);
                                            $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                            ?>
                                            <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                            <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Semester ini belum dimasukkan.</small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="ix">


                            <table id="example2" class="table table-bordered table-striped">
                                <?php
                                $no = 1;
                                $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                    rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                    where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "' 
                                    and rapot.semester='Ganjil' and tbl_kelas.kd_kelas='IX' order by rapot.nilai;");
                                $jml_lap = mysqli_num_rows($sql_laporan);
                                if ($jml_lap > 0) {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                           <tr class="">
                                               <th rowspan="2" width="5%">No</th>
                                               <th rowspan="2" width="20%">Mata Pelajaran</th>
                                               <th rowspan="2" width="5%">KKM*)</th>
                                               <th colspan="2" width="35%">Nilai</th>

                                               <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                           </tr>
                                           <tr class="">
                                            <th rowspan="2" align="center">Angka</th>
                                            <th rowspan="2" align="center">Huruf</th>
                                            <!-- <th align="center">Registrasi</th> -->
                                        </tr> 


                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                            $kelas=$data_mhs['kelas'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                <td><?php echo $data_mhs['kkm']; ?></td>
                                                <td><?php echo $data_mhs['nilai']; ?></td>
                                                <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                <td><?php echo $data_mhs['deskripsi']; ?></td>


                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                FROM rapot,tbl_kelas
                                                WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                and rapot.semester='Ganjil' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                            $total_nilai = mysqli_fetch_array($query_total);
                                            $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                            ?>
                                            <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                            <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Semester Ini belum dimasukkan.</small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="ixb">


                            <table id="example2" class="table table-bordered table-striped">
                                <?php
                                $no = 1;
                                $sql_laporan = mysqli_query($link, "SELECT tbl_siswa.nis,tbl_mapel.nama_mapel,rapot.kkm,rapot.nilai,rapot.ket_nilai,
                                    rapot.deskripsi,rapot.semester,tbl_kelas.kd_kelas,tbl_kelas.kelas FROM tbl_siswa,tbl_mapel,rapot,tbl_kelas
                                    where tbl_siswa.nis=rapot.nis and tbl_mapel.kd_mapel=rapot.kd_mapel and tbl_siswa.nis='" . $_SESSION['admin-siswa'] . "' 
                                    and rapot.semester='Genap' and tbl_kelas.kd_kelas='IX' order by rapot.nilai;");
                                $jml_lap = mysqli_num_rows($sql_laporan);
                                if ($jml_lap > 0) {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                           <tr class="">
                                               <th rowspan="2" width="5%">No</th>
                                               <th rowspan="2" width="20%">Mata Pelajaran</th>
                                               <th rowspan="2" width="5%">KKM*)</th>
                                               <th colspan="2" width="35%">Nilai</th>

                                               <th rowspan="2" width="30%">Deskripsi Kemajuan Belajar</th>
                                           </tr>
                                           <tr class="">
                                            <th rowspan="2" align="center">Angka</th>
                                            <th rowspan="2" align="center">Huruf</th>
                                            <!-- <th align="center">Registrasi</th> -->
                                        </tr> 


                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data_mhs = mysqli_fetch_array($sql_laporan)) {
                                            $kelas=$data_mhs['kelas'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_mhs['nama_mapel']; ?></td>
                                                <td><?php echo $data_mhs['kkm']; ?></td>
                                                <td><?php echo $data_mhs['nilai']; ?></td>
                                                <td><?php echo $data_mhs['ket_nilai']; ?></td>
                                                <td><?php echo $data_mhs['deskripsi']; ?></td>


                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $query_total = mysqli_query($link, "SELECT rapot.nis,tbl_kelas.id_kelas,
                                                tbl_kelas.kelas,Sum(rapot.nilai) as tot_nilai
                                                FROM rapot,tbl_kelas
                                                WHERE rapot.id_kelas=tbl_kelas.id_kelas and rapot.nis ='" . $_SESSION['admin-siswa'] . "' 
                                                and rapot.semester='Genap' and tbl_kelas.kelas='".$kelas."' GROUP BY rapot.nis");
                                            $total_nilai = mysqli_fetch_array($query_total);
                                            $jml_nilai_mhs = $total_nilai['tot_nilai'];
                                            ?>
                                            <td colspan="5" class="text-right" style="vertical-align: middle; letter-spacing: 3px;font-weight: 900;">Total Nilai : </td>
                                            <td><big style="font-weight: 900;font-size: x-large;"><?php echo $jml_nilai_mhs; ?></big></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-dismissable alert-info">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <small><strong><i class="fa fa-warning fa-fw fa-2x"></i>Maaf !</strong> Nilai Anda Untuk semester Ini Belum di Masukkan</strong></i></small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>





                    </div>
                </div>


            </div>
        </div>