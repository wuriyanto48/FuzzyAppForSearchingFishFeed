<?php

include_once "../page/model/jenis_pakan_model.php";




if(isset($_POST['Simpan'])){
    $kode_pakan = filter_input(INPUT_POST, 'kode_pakan');
    $nama_pakan = strtoupper(filter_input(INPUT_POST, 'nama_pakan'));
    $tipe_pakan = filter_input(INPUT_POST, 'tipe_pakan');
    $harga = filter_input(INPUT_POST, 'harga');
    $bobot_kadar_air = filter_input(INPUT_POST, 'bobot_kadar_air');
    $bobot_protein = filter_input(INPUT_POST, 'bobot_protein');
    $bobot_lemak = filter_input(INPUT_POST, 'bobot_lemak');
    $bobot_serat_kasar = filter_input(INPUT_POST, 'bobot_serat_kasar');
    $bobot_kadar_abu = filter_input(INPUT_POST, 'bobot_kadar_abu');
    $gambar_pakan = addslashes($_FILES['gambar_pakan']['tmp_name']);
    $gambar_pakan_size = getimagesize($_FILES['gambar_pakan']['tmp_name']);
    $gambar_pakan_name = addslashes($_FILES['gambar_pakan']['name']);
    
    $pd = new Jenis_pakan_dao_impl();
    $pdd = new Jenis_pakan_detail_dao_impl();
    $pgd = new Jenis_pakan_gambar_dao_impl();
    
    $pd->save($kode_pakan, $tipe_pakan, $nama_pakan, $harga);
    $pdd->save($kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu);
    $pgd->save($kode_pakan, $gambar_pakan);
    header("location:data_pakan.php");
}
