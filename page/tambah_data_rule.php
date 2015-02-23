<?php
session_start();
include "../page/util/kelas_validasi.php";
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

    $k = buatKode(4);
    $id_rule = "R" . $k;
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
                $('#form-rule').validate({
                    messages: {
                        umur_min: {
                            required: "Masukan Umur Minimum Ikan !!"
                        },
                        umur_max: {
                            required: "Masukan Umur Maksimum Ikan !!"
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
                    <h2>Tambah Data Rule</h2>
                    <div class="block">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Menambah data rule ke sistem
                            </div>
                            <div class="panel-body">
                                <form action="tambah_data_rule_finish.php" method="post" id="form-rule" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode Rule :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="id_rule" value="<? echo $id_rule; ?>" class="form-control" readonly="true"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jenis Ikan :</label>
                                        <div class="col-sm-4">
                                            <select name="kode_ikan" class="form-control">
                                                <?php
                                                include_once "../page/model/jenis_ikan_model.php";

                                                $jid = new Jenis_ikan_dao_impl();
                                                $list_ikan = $jid->find_all();
                                                for ($i = 0; $i < count($list_ikan); $i++) {
                                                    $ji = $list_ikan[$i];
                                                    $kode_ikan = $ji->getKode();
                                                    $nama_ikan = $ji->getNama_jenis();
                                                    echo "<option value='$kode_ikan'>$nama_ikan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jenis Pakan :</label>
                                        <div class="col-sm-4">
                                            <select name="kode_pakan" class="form-control">
                                                <?php
                                                include_once "../page/model/jenis_pakan_model.php";

                                                $jpd = new Jenis_pakan_dao_impl();
                                                $list_pakan = $jpd->find_all();
                                                for ($i = 0; $i < count($list_pakan); $i++) {
                                                    $jp = $list_pakan[$i];
                                                    $kode_pakan = $jp->getKode_pakan();
                                                    $nama_pakan = $jp->getNama_pakan();
                                                    echo "<option value='$kode_pakan'>$nama_pakan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Umur Minimum :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="umur_min" class="form-control required" placeholder="Umur Minimum"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Umur Maksimum :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="umur_max" class="form-control required" placeholder="Umur Maksimum"/>
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
