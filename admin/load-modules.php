<?php

if (isset($_GET['admin'])) {
    $page = antiinjection($_GET['admin']);
    $module = $page;
} else {
    $module = "";
}
switch ($module) {
    //------------Route Untuk Halaman Beranda------------//
    case 'beranda': case '':
    require("modules/beranda/index.php");
    break;

    //------------Route Untuk Halaman Data Guru------------//
    case 'dt_guru' :
    require("modules/guru/index.php");
    break;
    case 'add_guru' :
    require("modules/guru/add_guru.php");
    break;
    case 'ubah_guru' :
    require("modules/guru/ubah_guru.php");
    break;
    case 'del_guru' :
    require("modules/guru/del_guru.php");
    break;
    case 'cari_guru' :
    require("modules/guru/find_guru.php");
    break;
    //------------Route Untuk Halaman Data Mapel------------//
    case 'dt_mapel' :
    require("modules/mapel/index.php");
    break;
    case 'add_mapel' :
    require("modules/mapel/add_pelajaran.php");
    break;
    case 'cari_mapel' :
    require("modules/mapel/find-mapel.php");
    break;
    case 'del_mapel' :
    require("modules/mapel/del_mapel.php");
    break;
    case 'ubah_mapel' :
    require("modules/mapel/ubah_mapel.php");
    break;
    //-----------Route Untuk Halaman Kelas-------------//
    case 'dt_kelas' :
    require("modules/kelas/index.php");
    break;
    case 'add_kelas' :
    require("modules/kelas/add_kelas.php");
    break;
    case 'cari_kelas' :
    require("modules/kelas/find_kelas.php");
    break;
    case 'del_kelas' :
    require("modules/kelas/del_kelas.php");
    break;
    case 'ubah_kelas' :
    require("modules/kelas/ubah_kelas.php");
    break;

    //------------Route Untuk Halaman Wali Kelas------------//
    case 'dt_wali' :
    require("modules/wali kelas/index.php");
    break;
    case 'ubah_wali' :
    require("modules/wali kelas/ubah_wali.php");
    break;
    case 'add_wali' :
    require("modules/wali kelas/add_wali.php");
    break;
    

    //------------Route Untuk Halaman SIswa-----------//
    case 'dt_siswa' :
    require("modules/siswa/index.php");
    break;
    case 'form_siswa' :
    require("modules/siswa/form_siswa.php");
    break;
    case 'add_siswa' :
    require("modules/siswa/add_siswa.php");
    break;
    case 'del_siswa' :
    require("modules/siswa/del_siswa.php");
    break;
    case 'form_ubah' :
    require("modules/siswa/ubah_siswa.php");
    break;
    case 'ubah_siswa' :
    require("modules/siswa/ubah.php");
    break;
    case 'detail_siswa' :
    require("modules/siswa/detail.php");
    break;
    case 'cari_siswa' :
    require("modules/siswa/find-siswa.php");
    break;
    case 'siswa' :
    require("modules/siswa/data.php");
    break;

    //------------Route Untuk Halaman Statistik------------//
    case 'nilai' :
    require("modules/nilai/index.php");
    break;
    case 'add_nilai' :
    require("modules/nilai/add_nilai.php");
    break;

    //------------Route Untuk Halaman Prestasi------------//
    case 'prestasi' :
    require("modules/prestasi/index.php");
    break;
    case 'add_prestasi' :
    require("modules/prestasi/add_prestasi.php");
    break;
    case 'cari_prestasi' :
    require("modules/prestasi/find-prestasi.php");
    break;
    case 'ubah_prestasi' :
    require("modules/prestasi/ubah_prestasi.php");
    break;
    case 'ubh_dt' :
    require("modules/perangkingan/rangk_update.php");
    break;
    case 'p_ubh_dt' :
    require("modules/perangkingan/p_rangk_update.php");
    break;
    case 'hps_dt' :
    require("modules/perangkingan/hapus_perangkingan.php");
    break;
    case 'hapus_seleksi' :
    require("modules/perangkingan/hapus_pilihan_alt.php");
    break;
    case 'histori' :
    require("modules/perangkingan/data_histori.php");
    break;
    case 'hapus_histori' :
    require("modules/perangkingan/hps_histori.php");
    break;
    case 'cari_histori' :
    require("modules/perangkingan/histori_search.php");
    break;
    case 'proses_spk' :
    require("modules/perangkingan/langkah-spk.php");
    break;

    //------------Route Untuk Halaman Pengaturan------------//
    case 'pengaturan_admin' :
    require("modules/pengaturan/index.php");
    break;
    case 'cari_akun' :
    require("modules/pengaturan/search_akun.php");
    break;
    case 'reset_akun' :
    require("modules/pengaturan/reset_pass.php");
    break;
    case 'aktivasi' :
    require("modules/pengaturan/aktif-akun.php");
    break;
    case 'hapus_akun' :
    require("modules/pengaturan/hapus_mhs.php");
    break;
    case 'proses_akun' :
    require("modules/pengaturan/p_reset.php");
    break;
    case 'ubah_pass' :
    require("modules/pengaturan/ubah_admin.php");
    break;
    case 'ubah_admin_email' :
    require("modules/pengaturan/ubah_email.php");
    break;
    default :
    require("404.php");
    break;
}
?>