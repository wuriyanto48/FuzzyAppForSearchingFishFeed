<?php
session_start();
include "../page/util/kelas_validasi.php";
include_once "../page/model/jenis_ikan_model.php";
if (!isset($_SESSION['username_login']) && !isset($_SESSION['password_login'])) {
    Validasi::harus_login();
} else {
    if (isset($_GET['kode_ikan'])) {
        $kode = filter_input(INPUT_GET, 'kode_ikan');
        $token = filter_input(INPUT_GET, 'token');

        $cek = md5(md5($kode) . md5("kata diacak"));
        if ($token == $cek) {
            $j = new Jenis_ikan_dao_impl();
            $ikan = $j->find_one($kode);
            $kode_ikan = $ikan->getKode();
            $nama_jenis = $ikan->getNama_jenis();
            $keterangan = $ikan->getKeterangan();
        } else {
            echo "SQL Injection detected !!!";
        }
    }
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
                $('#form-ikan').validate({
                    messages: {
                        harga_pakan: {
                            required: "Masukan harga pakan !!"
                        },
                        umur_ikan: {
                            required: "Masukan umur ikan !!"
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
                    <h2>Ubah Data Ikan</h2>
                    <div class="block">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Merubah data ikan di sistem
                            </div>
                            <div class="panel-body">
                                <form action="ubah_data_ikan_finish.php" method="post" id="form-ikan" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode Jenis Ikan :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="kode_jenis" value="<? echo $kode_ikan; ?>" class="form-control" readonly="true"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Jenis Ikan :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nama_jenis" value="<? echo $nama_jenis; ?>" class="form-control required" placeholder="Nama Jenis Ikan"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Keterangan :</label>
                                        <div class="col-sm-4">
                                            <textarea rows="5" name="keterangan" class="form-control required"><? echo $keterangan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Gambar Ikan :</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="gambar_ikan"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Gambar Sebelumnya :</label>
                                        <img src="ambil_gambar_ikan.php?kode_ikan=<? echo $kode_ikan; ?>&token=<? echo $token; ?>" class="img-thumbnail" width="200" height="150"/>
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
