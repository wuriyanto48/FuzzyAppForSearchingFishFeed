<?php

# BY WURIYANTO
# COPYRIGHT 2014

include_once "./model/jenis_pakan_model.php";
include_once "./model/rule_ikan_pakan_model.php";
include_once "fuzzy_logic.php";
include_once './model/hasil_model.php';

class MesinLogika {

    public static function logic_engine($kode_ikan, $tipe_pakan, $harga, $himpUmur, $logika) {
        $hasil = array();
        $pakan_dao = new Jenis_pakan_dao_impl();
        $rule_dao = new Rule_ikan_pakan_dao_impl();


        $list_rule = $rule_dao->find_all();
        for ($i = 0; $i < count($list_rule); $i++) {
            $rule = $list_rule[$i];
            $umur_min = $rule->getUmur_min();
            $umur_max = $rule->getUmur_max();
            $kode_ikan_on_rule = $rule->getKode_jenis_ikan();
            $kode_pakan_on_rule = $rule->getKode_jenis_pakan();
            $pakan = $pakan_dao->find_one_b($kode_pakan_on_rule);
            $kode_tipe_pakan = $pakan->getKode_tipe();
            $harga_pakan = $pakan->getHarga();

            $m = new MesinLogika();
            $f = new FuzzyLogicIkan();
            if ($harga_pakan <= $harga) {
                if ($kode_ikan == $kode_ikan_on_rule && $tipe_pakan == $kode_tipe_pakan) {
                    if ($logika == "DAN") {
                        $has = new Hasil_pencarian();
                        $hasilMiuHargaMurah = $f->miuHargaMurah($harga_pakan);
                        $hasilMiuHargaSedang = $f->miuHargaSedang($harga_pakan);
                        $hasilMiuHargaMahal = $f->miuHargaMahal($harga_pakan);

                        $nilaiTengahUmur = $m->ambilNilaiTengah($umur_min, $umur_max);
                        $hasilMiuUmur = $m->ambilHasilUmur($nilaiTengahUmur, $himpUmur);
                        $has->setKode_pakan($pakan->getKode_pakan());
                        $has->setMiuHargaMurah($hasilMiuHargaMurah);
                        $has->setMiuHargaSedang($hasilMiuHargaSedang);
                        $has->setMiuHargaMahal($hasilMiuHargaMahal);
                        $has->setMiuUmur($hasilMiuUmur);
                        $has->setRes(min(min($hasilMiuHargaMurah, $hasilMiuHargaSedang, $hasilMiuHargaMahal), $hasilMiuUmur));
                        if ($hasilMiuUmur > 0) {
                            $hasil[] = $has;
                        }
                    } else if ($logika == "ATAU") {
                        
                    }
                }
            }
        }
        return $hasil;
    }

    public static function logic_engin_type_2($kode_ikan, $tipe_pakan, $harga, $himpUmur, $logika) {
        $hasil = array();
        $pakan_dao = new Jenis_pakan_dao_impl();
        $rule_dao = new Rule_ikan_pakan_dao_impl();


        $list_rule = $rule_dao->find_all();
        for ($i = 0; $i < count($list_rule); $i++) {
            $rule = $list_rule[$i];
            $umur_min = $rule->getUmur_min();
            $umur_max = $rule->getUmur_max();
            $kode_ikan_on_rule = $rule->getKode_jenis_ikan();
            $kode_pakan_on_rule = $rule->getKode_jenis_pakan();
            $pakan = $pakan_dao->find_one_b($kode_pakan_on_rule);
            $kode_tipe_pakan = $pakan->getKode_tipe();
            $harga_pakan = $pakan->getHarga();

            $m = new MesinLogika();
            if ($kode_ikan == $kode_ikan_on_rule && $tipe_pakan == $kode_tipe_pakan) {
                if ($logika == "DAN") {
                    $has = new Hasil_Pencarian_type_2();
                    $hasilMiuHarga = $m->ambilHasilHarga($harga_pakan, $harga);

                    $nilaiTengahUmur = $m->ambilNilaiTengah($umur_min, $umur_max);
                    $hasilMiuUmur = $m->ambilHasilUmur($nilaiTengahUmur, $himpUmur);
                    $has->setKodePakan($pakan->getKode_pakan());
                    $has->setMiuHarga($hasilMiuHarga);
                    $has->setMiuUmur($hasilMiuUmur);
                    $has->setHasilAkhir(min($hasilMiuHarga, $hasilMiuUmur));
                    if ($hasilMiuUmur > 0 && $hasilMiuHarga > 0) {
                        $hasil[] = $has;
                    }
                } else if ($logika == "ATAU") {
                    
                }
            }
        }
        return $hasil;
    }

    public function ambilHasilHarga($harga, $miu) {
        $hasil = 0.0;
        $f = new FuzzyLogicIkan();
        switch ($miu) {
            case "MURAH":
                $hasil = $f->miuHargaMurah($harga);
                break;
            case "SEDANG":
                $hasil = $f->miuHargaSedang($harga);
                break;
            case "MAHAL";
                $hasil = $f->miuHargaMahal($harga);
                break;
        }
        return $hasil;
    }

    public function ambilHasilUmur($umur, $himp) {
        $hasil = 0.0;
        $f = new FuzzyLogicIkan();
        switch ($himp) {
            case "LARVA":
                $hasil = $f->miuUmurLarva($umur);
                break;
            case "BENIH":
                $hasil = $f->miuUmurBenih($umur);
                break;
            case "JUVENIL":
                $hasil = $f->miuUmurJuvenil($umur);
                break;
            case "KONSUMSI":
                $hasil = $f->miuUmurKonsumsi($umur);
                break;
            case "DEWASA":
                $hasil = $f->miuUmurDewasa($umur);
                break;
        }
        return $hasil;
    }

    public function ambilNilaiTengah($umur_min, $umur_max) {
        $hasil = ($umur_min + $umur_max) / 2;
        return $hasil;
    }

    public function buatArrayUmur($min, $max) {
        $a = array();
        for ($i = $min; $i <= $max; $i++) {
            $a[] = $i;
        }
        return $a;
    }

}
