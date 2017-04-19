<?php
if (!isset($_SESSION['admin-kepsek'])){
    header("location:../user/index.php");
  }
//include "config/config.php";
?>
<script src="http://127.0.0.1/e-raport/admin/js/select2.js" type="text/javascript"></script>
<script src="http://127.0.0.1/e-raport/admin/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_mapel").select2({
            placeholder: 'Pilih Pelajaran',
            allowClear: true
        });
    });
</script>
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

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Hasil Belajar SIswa
        </section>
        <section class="content-header" align="center" style="background:#EDEDED"><h1>
            Daftar Nilai Siswa | SMPN 1 Mataram
            <small></small>
        </h1></section>
        <section class="content-header">
            <form method="post">
                <div class="box-body">
                    <div class="row">
                      <div class="col-xs-3">
                        <label>Mata Pelajaran</label>
                        <select name="mapel" id="id_mapel" multiple="multiple" style="width: 250px" class="form-control">
                        <?php
                          include "../../../config/config.php";
                          $q = mysqli_query($link,"SELECT kd_mapel, nama_mapel from tbl_mapel");
                          while($r = mysqli_fetch_array($q)) {
                        ?>
                        <option value="<?php echo $r['kd_mapel'] ?>">
                          <?php echo $r['kd_mapel']." ".$r['nama_mapel'] ?>
                        </option>
                          <?php
                              }
                          ?>
                        </select>
                      </div>
                      <div class="col-xs-3">
                      <label>Kelas</label>
                      <select name="kelas" id="id_kelas" multiple="multiple" style="width: 250px" class="form-control">
                        <?php
                          include "../../../config/config.php";
                          $q = mysqli_query($link,"SELECT id_kelas, kelas from tbl_kelas group by kelas");
                          while($r = mysqli_fetch_array($q)) {
                          ?>
                          <option value="<?php echo $r['kelas'] ?>">
                          <?php echo $r['kelas'] ?>
                            </option>
                          <?php
                            }
                          ?>
                      </select>
                    </div>
                  <div class="col-xs-2">
                  <label>Semester</label>
                    <select required="" name="semester" class="form-control">
                    <option value="">Pilih Semester</option>
                    <option value="Genap" >Genap</option>
                    <option value="Ganjil" >Ganjil</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="box-body">
                  <div class="row">
                    <div class="col-xs-7">
                      <p>
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                        <i class="fa  fa-cog fa-spin fa-lg"></i> Proses Data <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                        <li><button  style="width:auto"  id="simpan" type="submit" name="proses" class="btn btn-primary btn-flat" ><i class="fa fa-filter"></i> Filter Data </button></li>
                        
                        </ul>
                      </div>
                      <br/>
                      </p>

                    </div>
                  </div>
              </div>
                <!-- <script>
                  $("#dispen").hide();
          </script> -->
          </form>
            <?php
              if (isset($_POST['proses'])) {
                ?>
              <!-- <script>
              $("#dispen").show();
              </script> -->

                  <?php
                        //$tgl = $_POST['tanggal'];
                      $mapel = $_POST['mapel'];
                      $kelas=$_POST['kelas'];
                      $semester=$_POST['semester'];
                      // $per_hal = 10;
                      // $jumlah_record = mysqli_query ($link,"select tbl_siswa.nis,tbl_siswa.nama_lengkap,tbl_mapel.kd_mapel,tbl_mapel.nama_mapel,
                      //                                      tbl_kelas.id_kelas,tbl_kelas.kelas,rekap_nilai.semester,rekap_nilai.kkm,
                      //                                      rekap_nilai.nilai_akhir from tbl_siswa,tbl_mapel,tbl_kelas,
                      //                                      rekap_nilai where tbl_siswa.nis=rekap_nilai.nis and tbl_mapel.kd_mapel=rekap_nilai.kd_mapel
                      //                                      and tbl_kelas.id_kelas=rekap_nilai.id_kelas");
                      //                              //$jum = mysql_result($jumlah_record,0);
                      // $jmldata    = mysqli_num_rows($jumlah_record);
                      // $halaman = ceil($jmldata/$per_hal);
                      // $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                      // $start = ($page - 1) * $per_hal;


                      $sql ="select tbl_siswa.nis,tbl_siswa.nama_lengkap,tbl_mapel.kd_mapel,tbl_mapel.nama_mapel,tbl_guru.nip,tbl_guru.nama_guru,
                             tbl_kelas.id_kelas,tbl_kelas.kelas,rekap_nilai.semester,rekap_nilai.kkm,
                             rekap_nilai.nilai_akhir,rekap_nilai.keterangan from tbl_siswa,tbl_mapel,tbl_kelas,tbl_guru,
                             rekap_nilai where tbl_siswa.nis=rekap_nilai.nis and tbl_mapel.kd_mapel=rekap_nilai.kd_mapel and tbl_guru.nip=rekap_nilai.nip
                             and tbl_kelas.id_kelas=rekap_nilai.id_kelas and tbl_mapel.kd_mapel='$mapel' and tbl_kelas.kelas='$kelas'
                             and rekap_nilai.semester='$semester'";
                           } else {
                            // $per_hal = 10;
                            // $jumlah_record = mysqli_query ($link,"select tbl_siswa.nis,tbl_siswa.nama_lengkap,tbl_mapel.kd_mapel,tbl_mapel.nama_mapel,
                            //                             tbl_kelas.id_kelas,tbl_kelas.kelas,rekap_nilai.semester,rekap_nilai.kkm,rekap_nilai.nilai_akhir from tbl_siswa,tbl_mapel,tbl_kelas,
                            //                             rekap_nilai where tbl_siswa.nis=rekap_nilai.nis and tbl_mapel.kd_mapel=rekap_nilai.kd_mapel
                            //                             and tbl_kelas.id_kelas=rekap_nilai.id_kelas");
                            //                     //$jum = mysql_result($jumlah_record,0);
                            // $jmldata    = mysqli_num_rows($jumlah_record);
                            // $halaman = ceil($jmldata/$per_hal);
                            // $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                            // $start = ($page - 1) * $per_hal;
                            $sql = "select tbl_siswa.nis,tbl_siswa.nama_lengkap,tbl_mapel.kd_mapel,tbl_mapel.nama_mapel,tbl_guru.nip,tbl_guru.nama_guru,
                                    tbl_kelas.id_kelas,tbl_kelas.kelas,rekap_nilai.semester,rekap_nilai.kkm,rekap_nilai.nilai_akhir,rekap_nilai.keterangan from tbl_siswa,tbl_mapel,tbl_kelas,tbl_guru,
                                    rekap_nilai where tbl_siswa.nis=rekap_nilai.nis and tbl_guru.nip=rekap_nilai.nip and tbl_mapel.kd_mapel=rekap_nilai.kd_mapel
                                    and tbl_kelas.id_kelas=rekap_nilai.id_kelas";
                              }
                            ?>
                        </section>

                                             <!-- Main content -->
                        <section class="content">

                                                <!-- Small boxes (Stat box) -->
                          <div class="box box-info">
                            <div class="box-header">

                              </div><!-- /.box-header --><br>

                                <div class="box-body table-responsive" id="data-mahasiswa">
                                  <div class="col-md-12">
                                      <table class="table">
                                        <?php
                                          $query1 = mysqli_query($link,$sql);
                                          $i_m = mysqli_fetch_assoc($query1);
                                        ?>
                                          <tr>
                                              <td width="20%">Mata Pelajaran *</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $i_m['nama_mapel'];?> </big></strong></td>
                                              <small><p color="Red">*Nama Pelajaran Akan Berubah Otomatis Setelah Data di Filter</p></small>
                                            </tr>
                                            <tr>
                                              <td width="20%">Nama Guru</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $i_m['nama_guru'];?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="20%">Kelas</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $i_m['kelas'];?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="20%">Semester</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $i_m['semester']; ?></big></strong></td>
                                            </tr>

                                      </table>
                                  </div>
                                      <table id="example1" class="table table-bordered table-striped">
                                        <?php
                                          if (isset($_SESSION['alert'])) {
                                              echo $_SESSION['alert'];
                                              } unset($_SESSION['alert']);
                                        ?>
                                        <?php
                                          $query = mysqli_query($link,$sql);
                                          $j = mysqli_num_rows($query);
                                          if ($j > 0) {
                                        ?>
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                           <th>Kelas</th>
                                           <th>Mata Pelajaran</th>
                                            <th>Semester</th>
                                            <th>KKM</th>
                                            <th>Nilai</th>
                                            <th>Huruf</th>
                                            <th>Keterangan</th>
                                            
                                          </tr>



                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                $i = 1;

                                                                while ($data = mysqli_fetch_assoc($query)) {
                                                                    $nilai = $data['nilai_akhir'];
                                                                    $nis = $data['nis'];
                                                                    $kelas= $data['kelas'];

                                                                    ?>
                                                                    <tr class="">
                                                                        <td><?php echo $i; ?></td>
                                                                        <td><?php echo $data['nis']."  ".$data['nama_lengkap']; ?></td>
                                                                        <!--  <td><?php //echo $data['nip']; ?></td> -->
                                                                        <td><?php echo $data['kelas']; ?></td>
                                                                        
                                                                        <td><?php echo $data['nama_mapel']?></td>

                                                                        <td><?php echo $data['semester']; ?></td>
                                                                        <td><?php echo $data['kkm']; ?></td>
                                                                        
                                                                        <td><?php echo $nilai; ?></td>
                                                                        <td><?php echo $data['keterangan']; ?></td>
                                                                        <td>

                                                                            <?php
                                                                            if($nilai >= 85){
                                                                                echo '<span class="badge bg-green"><i class="fa  fa-star" readonly></i><i class="fa  fa-star" readonly></i><i class="fa  fa-star" readonly></i> Sangat Memuaskan</span>';
                                                                            }
                                                                            elseif($nilai >= 70){
                                                                                echo '<span class="badge bg-white"><i class="fa  fa-star-half-o" readonly></i><i class="fa  fa-star-half-o" readonly></i> Memuaskan</span>';
                                                                            }
                                                                            elseif($nilai >= 55){
                                                                                echo '<span class="badge bg-yellow"><i class="fa  fa-star-half-o" readonly></i> Cukup</span>';
                                                                            }
                                                                            elseif($nilai <= 50){
                                                                                echo '<span class="badge bg-red"><i class="fa  fa-exclamation-triangle" readonly></i> Anda Gagal, Remidi</span>';
                                                                            }
                                                                            ?>

                                                                        </td>
                                                                        

                                                                        
                                                                   


                                                               </tr>
                                                               <?php
                                                               $i++;

                                                           }
                                                       } else {
                                                        ?>
                                                        <div class="alert alert-dismissable alert-info">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                            Belum Ada Data Nilai Yang di Inputkan. . .
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </tbody>

                                            </table>
                                            <!-- <nav>
                                                <ul class="pagination">

                                                    <li class="disabled"><a href="?admin=nilai&page=<?php echo $page -1 ?>" aria-label="Previous"> <span aria-hidden="true">«</span></a></li>
                                                </ul>
                                                <?php
                                                //for($x=1;$x<=$halaman;$x++)
                                                {
                                                    ?>
                                                    <ul class="pagination">
                                                        <li class="active"><a href="?admin=nilai&page=<?php echo $x ?>"><?php echo $x ?><span class="sr-only">(current)</span></a></li>
                                                    </ul>
                                                    <?php
                                                }
                                                ?>
                                                <ul class="pagination">
                                                    <li><a href="?admin=nilai&page=<?php echo $page +1 ?>" aria-label="Next"> <span aria-hidden="true">»</span></a></li>
                                                </ul>
                                            </nav> -->
                                        </div>

                                    </div><!-- /.box-body -->
                                    <!-- Main row -->


                                </section><!-- /.Left col -->


                            </section><!-- /.content -->
                        </aside><!-- /.right-side -->



    

                    <script src="http://127.0.0.1/e-raport/admin/js/select2.js" type="text/javascript"></script>
                    <script src="http://127.0.0.1/e-raport/admin/js/select2.min.js" type="text/javascript"></script>
                    <script>
    $("#nis1").change(function(){
        
        var id_md1 = $("#nis1").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "modules/nilai/ambil-guru.php",
            data: "md1="+id_md1,
            success: function(msg){     
                if(msg == ''){
                    alert('Tidak ada data Siswa');
                }
                else{
                    $("#SK1").html(msg);
                    
                    
                }
            }
        }); 
    });  
    </script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#nis").select2({
            placeholder: 'Pilih Siswa',
            allowClear: true
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#nis1").select2({
            placeholder: 'Pilih Pelajaran',
            allowClear: true
        });
    });
</script>
<script>
    $("#nis").change(function(){
        
        var id_md = $("#nis").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "modules/nilai/ambil-kelas.php",
            data: "md="+id_md,
            success: function(msg){     
                if(msg == ''){
                    alert('Tidak ada data Siswa');
                }
                else{
                    $("#SK").html(msg);
                    
                    
                }
            }
        }); 
    });  
    </script>
    
    

     
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
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
