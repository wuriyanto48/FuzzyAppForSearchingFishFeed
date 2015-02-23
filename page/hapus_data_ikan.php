<?php

include_once "../page/model/jenis_ikan_model.php";



if (isset($_GET['kode_ikan'])) {
    $kode_ikan = filter_input(INPUT_GET, 'kode_ikan');
    $token = filter_input(INPUT_GET, 'token');

    $cek = md5(md5($kode_ikan) . md5("kata diacak"));
    if ($token == $cek) {
        $jid = new Jenis_ikan_dao_impl();
        $jidg = new Jenis_ikan_gambar_dao_impl();
        $jid->delete($kode_ikan);
        $jidg->delete($kode_ikan);
        header("location:data_ikan.php");
    } else {
        echo "SQL Injection detected !!!";
    }
}