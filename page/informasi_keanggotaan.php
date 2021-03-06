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
                $('#form-cari').validate({
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
                                <li><a href="login_admin.php">Login</a></li>
                            </ul>
                            <br />
                            <span class="small grey">Login Administrator</span>
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
                    <li class="ic-dashboard"><a href="home.php"><span>Home</span></a> </li>
                    <li class="ic-form-style"><a href="pengujian.php"><span>Pencarian</span></a></li>
                    <li class="ic-data-ikan"><a href="data_ikan_sistem.php"><span>Data Ikan</span></a></li>
                    <li class="ic-charts"><a href="data_pakan_sistem.php"><span>Data Pakan</span></a></li>
                    <li class="ic-grid-tables"><a href="informasi_keanggotaan.php"><span>Informasi</span></a></li>
                    <li class="ic-notifications"><a href="tentang.php"><span>Tentang</span></a></li>

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
                                    <li><a href="home.php">Home</a> </li>

                                </ul>
                            </li>
                            <li><a class="menuitem">Data</a>
                                <ul class="submenu">
                                    <li><a href="data_ikan_sistem.php">Data Ikan</a> </li>
                                    <li><a href="data_pakan_sistem.php">Data Pakan</a> </li>
                                </ul>
                            </li>
                            <li><a class="menuitem">Informasi Pengguna</a>
                                <ul class="submenu">
                                    <li><a href="informasi_keanggotaan.php">Informasi</a> </li>
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
                    <h2>Data Pakan</h2>
                    <div class="block">
                        <p>* Pengelompokan umur ikan pada sistem yang telah dibuat:</p>
                        <table border="1" class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Nama Kategori Umur</th>
                                <th>Range Umur (Hari)</th>
                            </tr>
                            <?php
                            include_once '../page/model/keanggotaan_model.php';

                            $kdao = new Keanggotaan_umur_dao_impl();
                            $list_umur = $kdao->find_all();
                            for ($i = 0; $i < count($list_umur); $i++) {
                                $kat_model = $list_umur[$i];
                                $nama_kategori_umur = $kat_model->getNama_keanggotaan();
                                $range = $kat_model->getKeterangan();
                                echo "<tr><td>$nama_kategori_umur</td><td>$range</td></tr>";
                            }
                            ?>
                        </table>
                        <p>* Gambar Kurva Kategori Umur</p>
                        <p><img src="../images/kurva/kurva umur.jpg" class="img-thumbnail" width="500" height="400"/></p>
                        <p>* Pengelompokan harga pakan ikan pada sistem yang telah dibuat:</p>
                        <table border="1" class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Nama Kategori Harga</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                            include_once "../page/model/keanggotaan_model.php";

                            $khdao = new Keanggotaan_harga_dao_impl();
                            $list_harga = $khdao->find_all();
                            for ($i = 0; $i < count($list_harga); $i++) {
                                $kat_harga_model = $list_harga[$i];
                                $nama_kat_harga = $kat_harga_model->getNama_keanggotaan();
                                $keterangan_kategori_harga = $kat_harga_model->getKeterangan();

                                echo "<tr><td>$nama_kat_harga</td><td>$keterangan_kategori_harga</td></tr>";
                            }
                            ?>
                        </table>
                        <p>* Gambar Kurva Kategori Harga</p>
                        <p><img src="../images/kurva/kurva harga.jpg" class="img-thumbnail" width="500" height="400" /></p>
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
