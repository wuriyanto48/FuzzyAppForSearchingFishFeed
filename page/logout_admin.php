<?php
session_start();
include "../page/util/kelas_validasi.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_SESSION['username_login']) && isset($_SESSION['password_login'])){
    unset($_SESSION['username_login']);
    unset($_SESSION['password_login']);
    header("location:home.php");
}else{
    Validasi::harus_login();
}