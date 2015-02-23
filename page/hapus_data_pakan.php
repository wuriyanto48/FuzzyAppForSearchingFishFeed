<?php

include_once "../page/model/jenis_pakan_model.php";




if(isset($_GET['kode_pakan']) && isset($_GET['token'])){
    $kode_pakan = filter_input(INPUT_POST, 'kode_pakan');
    $token = filter_input(INPUT_POST, 'token');
    
    $cek = md5(md5($kode_pakan).md5("kata diacak"));
    if($token == $cek){
        $pd = new Jenis_pakan_dao_impl();
        $pdd = new Jenis_pakan_detail_dao_impl();
        $pgd = new Jenis_pakan_gambar_dao_impl();
        $pd->delete($kode_pakan);
        $pdd->delete($kode_pakan);
        $pgd->delete($kode_pakan);
        header("location:data_pakan.php");
    }else{
        echo "SQL Injection terdeteksi !!";
    }
}
