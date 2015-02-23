<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Validasi {

    public static function harus_login() {
        ?>
        <script language="javascript">alert('Anda harus login !!');</script>
        <script>document.location.href = './login_admin.php';</script>
        <?php

    }

    public static function login_gagal() {
        ?>
        <script language="javascript">alert('Username atau Password tidak valid !!');</script>
        <script>document.location.href = './login_admin.php';</script>
        <?php

    }

}
