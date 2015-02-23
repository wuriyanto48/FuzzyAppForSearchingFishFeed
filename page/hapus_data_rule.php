<?php

include_once "../page/model/rule_ikan_pakan_model.php";


if (isset($_GET['id_rule']) && isset($_GET['token'])) {

    $id_rule = filter_input(INPUT_GET, 'id_rule');
    $token = filter_input(INPUT_GET, 'token');

    $cek = md5(md5($id_rule) . md5("kata diacak"));
    if ($token == $cek) {
        $rd = new Rule_ikan_pakan_dao_impl();
        $rd->delete($id_rule);
        header("location:data_rule.php");
    } else {
        echo "SQL Injection terdeteksi !!";
    }
}

