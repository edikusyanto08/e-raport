<?php

mysql_connect('localhost','root','');
 mysql_select_db('db_raport');
$nis = $_GET['inputNis'];
$sql_cekjk = mysql_query("select nis,jk from tbl_siswa where nis='".$nis."'");
$dt_nama = mysql_fetch_assoc($sql_cekjk);
$ada_siswa = mysql_num_rows($sql_cekjk);
echo $dt_nama['jk'];

