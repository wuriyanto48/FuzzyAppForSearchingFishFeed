<?php

include_once "../page/model/jenis_ikan_model.php";


if(isset($_POST['Simpan'])){
    $kode_jenis = filter_input(INPUT_POST, 'kode_jenis');
    $nama_jenis = strtoupper(filter_input(INPUT_POST, 'nama_jenis'));
    $keterangan = filter_input(INPUT_POST, 'keterangan');
    $gambar_ikan = addslashes($_FILES['gambar_ikan']['tmp_name']);
    $gambar_ikan_name = addslashes($_FILES['gambar_ikan']['name']);
    $gambar_ikan_size = getimagesize($_FILES['gambar_ikan']['tmp_name']);
    
    $jd = new Jenis_ikan_dao_impl();
    $jdg = new Jenis_ikan_gambar_dao_impl();
    
    $jd->save($kode_jenis, $nama_jenis, $keterangan);
    $jdg->save($kode_jenis, $gambar_ikan);
    header("location:data_ikan.php");
}