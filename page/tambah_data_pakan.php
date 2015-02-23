<?php
session_start();
include_once "../page/util/kelas_validasi.php";
if (!isset($_SESSION['username_login']) && !isset($_SESSION['password_login'])) {
    Validasi::harus_login();
} else {

    function buatKode($length) {
        $random = "";
        srand((double) microtime() * 1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }

    $k = buatKode(3);
    $kode = "DP" . $k;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ta Wury</title>
        <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../styles/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/nav.css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
        <!-- BEGIN: load jquery -->
        <script type="text/javascript" src="../js/bootstrap/bootstrap.js"></script>
        <script src="../js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="../js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
        <!-- END: load jquery -->
        <!-- BEGIN: load jqplot -->
        <link rel="stylesheet" type="text/css" href="../styles/jquery.jqplot.min.css" />
        <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
        <script language="javascript" type="text/javascript" src="../js/jqPlot/jquery.jqplot.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
        <!-- END: load jqplot -->
        <script src="../js/setup.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/validate/jquery.validate.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#form-pakan').validate({
                    messages: {
                        nama_pakan: {
                            required: "Masukan nama pakan !!"
                        },
                        harga: {
                            required: "Masukan harga pakan !!"
                        },
                        bobot_kadar_air: {
                            required: "Masukan bobot kadar air !!"
                        },
                        bobot_protein: {
                            required: "Masukan bobot protein !!"
                        },
                        bobot_lemak: {
                            required: "Masukan bobot lemak !!"
                        },
                        bobot_serat_kasar: {
                            required: "Masukan bobot serat kasar !!"
                        },
                        bobot_kadar_abu: {
                            required: "Masukan bobot kadar abu !!"
                        }
                    }
                });
                setupLeftMenu();
                setSidebarHeight();
            });
        </script>
    </head>
    <body>
        <div class="container_12">
            <div class="grid_12 header-repeat">
                <div id="branding">
                    <div class="floatleft">
                        <img src="../images/logo.png" alt="Logo" /></div>
                    <div class="floatright">
                        <div class="floatleft">
                            <img src="../images//img-profile.jpg" alt="Profile Pic" /></div>
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Admin</li>
                                <li><a href="logout_admin.php" onclick="return confirm('Anda yakin ?')">Logout</a></li>
                            </ul>
                            <br />
                            <span class="small grey">Logout Administrator</span>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="home_admin.php"><span>Home</span></a> </li>
                    <li class="ic-data-ikan"><a href="data_ikan.php"><span>Data Ikan</span></a></li>
                    <li class="ic-charts"><a href="data_pakan.php"><span>Data Pakan</span></a></li>
                    <li class="ic-gallery"><a href="data_rule.php"><span>Data Rule</span></a></li>

                </ul>
            </div>
            <div class="clear">
            </div>
            <div class="grid_2">
                <div class="box sidemenu">
                    <div class="block" id="section-menu">
                        <ul class="section menu">
                            <li><a class="menuitem">Main menu</a>
                                <ul class="submenu">
                                    <li><a href="home_admin.php">Home</a> </li>
                                    <li><a href="tambah_data_ikan.php">Tambah Data Ikan</a></li>

                                </ul>
                            </li>
                            <li><a class="menuitem">Data</a>
                                <ul class="submenu">
                                    <li><a href="data_ikan.php">Data Ikan</a> </li>
                                    <li><a href="data_pakan.php">Data Pakan</a> </li>
                                    <li><a href="data_rule.php">Data Rule</a></li>
                                </ul>
                            </li>
                            <li><a class="menuitem">Tentang</a>
                                <ul class="submenu">
                                    <li><a href="https://www.facebook.com/wuriyanto" target="blank">Facebook</a> </li>
                                    <li><a href="http://wuriyantoinformatika.blogspot.com/" target="blank">My Site</a> </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid_10">
                <div class="box round first">
                    <h2>Tambah Data Pakan</h2>
                    <div class="block">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Menambah data pakan ke sistem
                            </div>
                            <div class="panel-body">
                                <form action="tambah_data_pakan_finish.php" method="post" id="form-pakan" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="kode_pakan" value="<? echo $kode; ?>" class="form-control" readonly="true"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Pakan :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nama_pakan" class="form-control required" placeholder="Nama Pakan"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipe Pakan :</label>
                                        <div class="col-sm-4">
                                            <select name="tipe_pakan" class="form-control">
                                                <?php
                                                include_once "../page/model/jenis_pakan_model.php";

                                                $tpd = new Tipe_pakan_dao_impl();
                                                $list_t = $tpd->find_all();
                                                for ($i = 0; $i < count($list_t); $i++) {
                                                    $t = $list_t[$i];
                                                    $kode_tipe = $t->getKode_tipe();
                                                    $nama_tipe = $t->getNama_tipe();
                                                    echo "<option value='$kode_tipe'>$nama_tipe</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Harga Pakan Rp. :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="harga" class="form-control required" placeholder="Harga"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bobot Kadar Air (%) :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bobot_kadar_air" class="form-control required" placeholder="Bobot Kadar Air"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bobot Protein (%) :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bobot_protein" class="form-control required" placeholder="Bobot Protein"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bobot Lemak (%) :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bobot_lemak" class="form-control required" placeholder="Bobot Lemak"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bobot Serat Kasar (%) :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bobot_serat_kasar" class="form-control required" placeholder="Bobot Serat Kasar"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Bobot Kadar Abu (%) :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="bobot_kadar_abu" class="form-control required" placeholder="Bobot Kadar Abu"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Gambar Pakan :</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="gambar_pakan" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-teal"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
        <div id="site_info">
            <p>
                Powered by <a href="https://www.facebook.com/wuriyanto" target="blank">Wuriyanto</a>
            </p>
        </div>
    </body>
</html>
