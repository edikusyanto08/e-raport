<?php

  mysql_connect('localhost','root','');
  mysql_select_db('db_raport');
$nis = $_GET['inputNis'];
$sql_ceknis = mysql_query("select nis, nama_lengkap from tbl_siswa
                    where nis='" . $nis . "'");
$dt_nama = mysql_fetch_assoc($sql_ceknis);
$ada_siswa = mysql_num_rows($sql_ceknis);
echo $dt_nama['nama_lengkap'];

