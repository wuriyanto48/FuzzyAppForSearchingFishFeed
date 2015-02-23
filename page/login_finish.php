<?php

session_start();
include_once "../page/model/admin_model.php";
include_once "../page/util/kelas_validasi.php";


if(isset($_POST['Login'])){
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    $enc_password = md5($password);
    
    $ad = new Admin_dao_impl();
    $a = $ad->login($username, $enc_password);
    if($a->getUsername() == $username && $a->getPassword() == $enc_password){
        $username_admin = $a->getUsername();
        $password_admin = $a->getPassword();
        $_SESSION['username_login'] = $username_admin;
        $_SESSION['password_login'] = $password_admin;
        header("location:home_admin.php");
    }  else {
        Validasi::login_gagal();
    }
}