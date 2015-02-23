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
                                    <li><a href="pengujian_tipe_2.php">Pencarian Tipe 2</a> </li>
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
                    <h2>Pencarian Pakan</h2>
                    <div class="block">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Pencarian jenis pakan yang cocok untuk ikan anda.
                            </div>
                            <div class="panel-body">
                                <form action="" method="post" id="form-cari" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jenis Ikan :</label>
                                        <div class="col-sm-4">
                                            <select name="kode_ikan" class="form-control">
                                                <?php
                                                include_once "../page/model/jenis_ikan_model.php";

                                                $jd = new Jenis_ikan_dao_impl();
                                                $list_ikan = $jd->find_all();
                                                for ($i = 0; $i < count($list_ikan); $i++) {
                                                    $ikan = $list_ikan[$i];
                                                    $kode_i = $ikan->getKode();
                                                    $nama_i = $ikan->getNama_jenis();
                                                    echo "<option value='$kode_i'>$nama_i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tipe pakan :</label>
                                        <div class="col-sm-4">
                                            <select name="tipe_pakan" class="form-control">
                                                <?php
                                                include_once "../page/model/jenis_pakan_model.php";

                                                $td = new Tipe_pakan_dao_impl();
                                                $list_tipe = $td->find_all();
                                                for ($i = 0; $i < count($list_tipe); $i++) {
                                                    $t = $list_tipe[$i];
                                                    $kode_t = $t->getKode_tipe();
                                                    $nama_t = $t->getNama_tipe();
                                                    echo "<option value='$kode_t'>$nama_t</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Umur ikan anda :</label>
                                        <div class="col-sm-4">
                                            <select name="umur_ikan" class="form-control">
                                                <?php
                                                include_once "../page/model/keanggotaan_model.php";

                                                $kd = new Keanggotaan_umur_dao_impl();
                                                $list_k = $kd->find_all();
                                                for ($i = 0; $i < count($list_k); $i++) {
                                                    $k = $list_k[$i];
                                                    $nama_k = $k->getNama_keanggotaan();
                                                    $ket_k = $k->getKeterangan();
                                                    echo "<option value='$nama_k'>$nama_k</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Harga yang diinginkan :</label>
                                        <div class="col-sm-4">
                                            <select name="harga_pakan" class="form-control">
                                                <?php
                                                include_once "./model/keanggotaan_model.php";
                                                $kh_dao = new Keanggotaan_harga_dao_impl();
                                                $list_kh = $kh_dao->find_all();
                                                for($i=0;$i<count($list_kh);$i++){
                                                    $kh = $list_kh[$i];
                                                    $nama_k_harga = $kh->getNama_keanggotaan();
                                                    echo "<option value='$nama_k_harga'>$nama_k_harga</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" name="Cari" value="Proses" class="btn btn-teal"/>
                                    </div>
                                </form>
                            </div>

                            <?php
                            include_once '../page/util/mesin_logika.php';
                            include_once '../page/model/jenis_pakan_model.php';
                            include_once '../page/model/jenis_ikan_model.php';

                            if (isset($_POST['Cari'])) {
                                $logika_3 = "DAN";
                                $harga = filter_input(INPUT_POST, 'harga_pakan');
                                $kode_ikan = filter_input(INPUT_POST, 'kode_ikan');
                                $umur_ikan = filter_input(INPUT_POST, 'umur_ikan');
                                $tipe_pakan = filter_input(INPUT_POST, 'tipe_pakan');

                                $ikan_dao = new Jenis_ikan_dao_impl();
                                $jpd = new Jenis_pakan_dao_impl();
                                $tipe_pakan_dao = new Tipe_pakan_dao_impl();

                                $ikan = $ikan_dao->find_one_b($kode_ikan);
                                $kode_ikan_res = $ikan->getKode();
                                $nama_ikan_res = $ikan->getNama_jenis();
                                $keterangan_res = $ikan->getKeterangan();

                                $tipe_pakan_entity = $tipe_pakan_dao->find_one($tipe_pakan);
                                $nama_tipe_res = $tipe_pakan_entity->getNama_tipe();

                                $token_ikan = md5(md5($kode_ikan_res) . md5("kata diacak"));

                                echo "<div class='panel panel-default'>";
                                echo "<div class='panel-heading'>";
                                echo "Hasil";
                                echo "</div>";
                                echo "<div class='panel-body'>";
                                echo "<p>Rekomendasi pakan yang cocok untuk ikan anda berdasarkan data-data yang anda inputkan</p>";
                                echo "</div>";

                                echo "<table class='table table-bordered table-hover table-striped'>";
                                echo "<tr><th colspan='4' align='center'>RULE : JIKA JENIS IKAN = $nama_ikan_res DAN TIPE PAKAN = $nama_tipe_res DAN KATEGORI UMUR IKAN = $umur_ikan $logika_3 HARGA = $harga</th></tr>";
                                echo "<tr><th colspan='4' align='center'>JENIS IKAN YANG ANDA MILIKI ADALAH $nama_ikan_res, DENGAN KATEGORI UMUR $umur_ikan </th></tr>";
                                echo "<tr><th colspan='4' align='center'>"
                                . "<label class='label label-success'>$nama_ikan_res</label><p><img src='ambil_gambar_ikan.php?kode_ikan=$kode_ikan_res&token=$token_ikan' width='300' height='200' class='img img-thumbnail'/></p><p>$keterangan_res</p>"
                                . "</th></tr>";
                                echo "<tr>";
                                echo "<th>Icon Pakan</th>";
                                echo "<th>Nama Pakan</th>";
                                echo "<th>Kategori Pakan</th>";
                                echo "<th>Aksi</th>";
                                echo "</tr>";

                                $log = array();
                                $h = MesinLogika::logic_engin_type_2($kode_ikan, $tipe_pakan, $harga, $umur_ikan, $logika_3);
                                for ($i = 0; $i < count($h); $i++) {
                                    $hasil = $h[$i];
                                    $kode_pakan = $hasil->getKodePakan();
                                    $miuHarga = $hasil->getMiuHarga();
                                    $miuUmur = $hasil->getMiuUmur();
                                    $hasilAkhir = $hasil->getHasilAkhir();

                                    $jp = $jpd->find_one_b($kode_pakan);
                                    $kode_pakan_res = $jp->getKode_pakan();
                                    $nama_pakan_res = $jp->getNama_pakan();
                                    $keterangan_hasil_akhir = "";

                                    $token = md5(md5($kode_pakan_res) . md5("kata diacak"));

                                    $log[] = "Kode Pakan : $kode_pakan_res, Nama Pakan : $nama_pakan_res, Bobot terhadap harga $harga = $miuHarga, Bobot terhadap umur $umur_ikan = $miuUmur";

                                    echo "<tr><td><img src='ambil_gambar_pakan.php?kode_pakan=$kode_pakan_res&token=$token' width='60' height='40'/></td><td>$nama_pakan_res</td><td>Bobot terhadap harga $harga = ( $miuHarga )</td><td><a href='data_pakan_detail_by_user.php?kode_pakan=$kode_pakan_res&token=$token' class='btn-icon btn-teal btn-check' target='blank'><span></span>Lihat</a></td></tr>";
                                }
                                echo "</table>";
                                $waktu = microtime();
                                echo "<div class='well well-sm'>Log : (total waktu: $waktu detik)";
                                for ($i = 0; $i < count($log); $i++) {
                                echo "<p>$log[$i]</p>";
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
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
