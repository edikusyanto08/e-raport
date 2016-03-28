<?php

mysql_connect('localhost','root','');
 mysql_select_db('db_raport');
$nis = $_GET['inputNis'];
$sql_cekmail = mysql_query("select nis,email from tbl_siswa where nis='".$nis."'");
$dt_nama = mysql_fetch_assoc($sql_cekmail);
$ada_siswa = mysql_num_rows($sql_cekmail);
echo $dt_nama['email'];

