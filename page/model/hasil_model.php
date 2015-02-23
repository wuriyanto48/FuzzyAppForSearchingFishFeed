<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Hasil_pencarian{
    private $kode_pakan;
    private $miuHargaMurah;
    private $miuHargaSedang;
    private $miuHargaMahal;
    private $miuUmur;
    private $res;
    

    public function getKode_pakan() {
        return $this->kode_pakan;
    }

    public function getMiuHargaMurah() {
        return $this->miuHargaMurah;
    }

    public function getMiuHargaSedang() {
        return $this->miuHargaSedang;
    }

    public function getMiuHargaMahal() {
        return $this->miuHargaMahal;
    }

    public function getMiuUmur() {
        return $this->miuUmur;
    }

    public function getRes() {
        return $this->res;
    }

    public function setKode_pakan($kode_pakan) {
        $this->kode_pakan = $kode_pakan;
    }

    public function setMiuHargaMurah($miuHargaMurah) {
        $this->miuHargaMurah = $miuHargaMurah;
    }

    public function setMiuHargaSedang($miuHargaSedang) {
        $this->miuHargaSedang = $miuHargaSedang;
    }

    public function setMiuHargaMahal($miuHargaMahal) {
        $this->miuHargaMahal = $miuHargaMahal;
    }

    public function setMiuUmur($miuUmur) {
        $this->miuUmur = $miuUmur;
    }

    public function setRes($res) {
        $this->res = $res;
    }



}

class Hasil_Pencarian_type_2{
    private $kodePakan;
    private $miuHarga;
    private $miuUmur;
    private $hasilAkhir;
    
    public function getKodePakan() {
        return $this->kodePakan;
    }

    public function getMiuHarga() {
        return $this->miuHarga;
    }

    public function getMiuUmur() {
        return $this->miuUmur;
    }

    public function getHasilAkhir() {
        return $this->hasilAkhir;
    }

    public function setKodePakan($kodePakan) {
        $this->kodePakan = $kodePakan;
    }

    public function setMiuHarga($miuHarga) {
        $this->miuHarga = $miuHarga;
    }

    public function setMiuUmur($miuUmur) {
        $this->miuUmur = $miuUmur;
    }

    public function setHasilAkhir($hasilAkhir) {
        $this->hasilAkhir = $hasilAkhir;
    }


}