<?php
session_start();
include "../page/util/kelas_validasi.php";
if (!isset($_SESSION['username_login']) && !isset($_SESSION['password_login'])) {
    Validasi::harus_login();
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
        <script type="text/javascript">

            $(document).ready(function() {
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
                                    <li><a href="tambah_data_pakan.php">Tambah Data Pakan</a></li>

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
                    <h2>Data Jenis Pakan</h2>
                    <div class="block">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Kode Pakan</th>
                                <th>Tipe Pakan</th>
                                <th>Nama Pakan</th>
                                <th>Harga Pakan Rp.</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            include_once "../page/model/jenis_pakan_model.php";


                            $jd = new Jenis_pakan_dao_impl();
                            $jml = $jd->jumlah_data();
                            $page = filter_input(INPUT_GET, 'page');
                            $batch = 5;
                            $pages = ceil($jml / $batch);
                            if (!$page)
                                $page = 1;
                            $start = ($page - 1) * $batch;

                            $list_pakan = $jd->find_all_limit($start, $batch);
                            for ($i = 0; $i < count($list_pakan); $i++) {
                                $p = $list_pakan[$i];
                                $kode_pakan = $p->getKode_pakan();
                                $kode_tipe = $p->getKode_tipe();
                                $nama_pakan = $p->getNama_pakan();
                                $harga = $p->getHarga();

                                $token = md5(md5($kode_pakan) . md5("kata diacak"));

                                echo "<tr><td>$kode_pakan</td><td>$kode_tipe</td><td>$nama_pakan</td><td>$harga</td>"
                                . "<td><a href='data_pakan_detail.php?kode_pakan=$kode_pakan&token=$token' class='btn-icon btn-teal btn-check' target='blank'><span></span>Detail</a>|"
                                . "<a href='ubah_data_pakan.php?kode_pakan=$kode_pakan&token=$token' class='btn-icon btn-teal btn-refresh'><span></span>Ubah</a>|<a href='hapus_data_pakan.php?kode_pakan=$kode_pakan&token=$token' class='btn-icon btn-teal btn-cross'><span></span>Hapus</a></td></tr>";

                                $start++;
                            }

                            if ($pages > 1) {
                                echo '<tr>';
                                echo "<td colspan='5'>Halaman : ";
                                for ($i = 1; $i <= $pages; $i++) {
                                    if ($i != ceil($start / $batch)) {
                                        echo " <a href='data_pakan.php?page=$i' class='btn btn-teal'>$i</a> ";
                                    } else {
                                        echo " <button class='btn btn-teal'>$i</button> ";
                                    }
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
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
