<?php

include_once "../page/model/rule_ikan_pakan_model.php";

if (isset($_POST['Simpan'])) {
    $id_rule = filter_input(INPUT_POST, 'id_rule');
    $kode_ikan = filter_input(INPUT_POST, 'kode_ikan');
    $kode_pakan = filter_input(INPUT_POST, 'kode_pakan');
    $umur_min = filter_input(INPUT_POST, 'umur_min');
    $umur_max = filter_input(INPUT_POST, 'umur_max');

    $rd = new Rule_ikan_pakan_dao_impl();
    $rd->update($id_rule, $kode_ikan, $kode_pakan, $umur_min, $umur_max);
    header("location:data_rule.php");
}
