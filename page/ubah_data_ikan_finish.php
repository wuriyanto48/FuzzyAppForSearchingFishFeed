<?php

include_once "../page/model/jenis_ikan_model.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['Simpan'])){
    $kode_ikan = filter_input(INPUT_POST, 'kode_jenis');
    $nama_jenis = strtoupper(filter_input(INPUT_POST, 'nama_jenis'));
    $keterangan = filter_input(INPUT_POST, 'keterangan');
    $gambar_ikan = addslashes($_FILES['gambar_ikan']['tmp_name']);
    $gambar_ikan_name = addslashes($_FILES['gambar_ikan']['name']);
    $gambar_ikan_size = getimagesize($_FILES['gambar_ikan']['tmp_name']);
    
    $jid = new Jenis_ikan_dao_impl();
    $jidg = new Jenis_ikan_gambar_dao_impl();
    $jid->update($kode_ikan, $nama_jenis, $keterangan);
    $jidg->update($kode_ikan, $gambar_ikan);
    header("location:data_ikan.php");
}