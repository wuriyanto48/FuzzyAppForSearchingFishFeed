<?php

# BY WURIYANTO
# COPYRIGHT 2014

class FuzzyLogicIkan {
    #Fungsi Keanggotaan Harga Pakan
    #Miu Harga Murah

    public function miuHargaMurah($harga) {
        $hasil = 0.0;
        if ($harga <= 1000) {
            $hasil = 1;
        } else if ($harga >= 18000) {
            $hasil = 0;
        } else if ($harga > 1000 && $harga < 18000) {
            $hasil = (18000 - $harga) / (18000 - 1000);
        }
        return $hasil;
    }

    #Miu Harga Sedang

    public function miuHargaSedang($harga) {
        $hasil = 0.0;
        if ($harga <= 8000 && $harga >= 40000) {
            $hasil = 0;
        } else if ($harga > 1000 && $harga < 18000) {
            $hasil = ($harga - 1000) / (18000 - 1000);
        } else if ($harga > 18000 && $harga < 35000) {
            $hasil = (35000 - $harga) / (35000 - 18000);
        }
        return $hasil;
    }

    #Miu Harga Mahal

    public function miuHargaMahal($harga) {
        $hasil = 0.0;
        if ($harga <= 18000) {
            $hasil = 0;
        } else if ($harga >= 35000) {
            $hasil = 1;
        } else if ($harga > 18000 && $harga < 35000) {
            $hasil = ($harga - 18000) / (35000 - 18000);
        }
        return $hasil;
    }

    #Fungsi Keanggotaan Umur Ikan

    public function miuUmurLarva($umur) {
        $hasil = 0.0;
        if ($umur <= 15) {
            $hasil = 1;
        } else if ($umur >= 45) {
            $hasil = 0;
        } else if ($umur > 15 && $umur < 45) {
            $hasil = (45 - $umur) / (45 - 15);
        }
        return $hasil;
    }

    public function miuUmurBenih($umur) {
        $hasil = 0.0;
        if ($umur <= 15 && $umur >= 75) {
            $hasil = 0.0;
        }else if($umur == 45){
            $hasil = 1.0;
        } else if ($umur > 15 && $umur < 45) {
            $hasil = ($umur - 15) / (45 - 15);
        } else if ($umur > 45 && $umur < 75) {
            $hasil = (75 - $umur) / (75 - 45);
        }
        return $hasil;
    }

    public function miuUmurJuvenil($umur) {
        $hasil = 0.0;
        if ($umur <= 45 && $umur >= 120) {
            $hasil = 0.0;
        }else if($umur == 75){
            $hasil = 1.0;
        } else if ($umur > 45 && $umur < 75) {
            $hasil = ($umur - 45) / (75 - 45);
        } else if ($umur > 75 && $umur < 120) {
            $hasil = (120 - $umur) / (120 - 75);
        }
        return $hasil;
    }
    
    public function miuUmurKonsumsi($umur){
        $hasil = 0.0;
        if($umur <= 75 && $umur >= 150){
            $hasil = 0.0;
        }else if($umur == 120){
            $hasil = 1.0;
        }else if($umur > 75 && $umur < 120){
            $hasil = ($umur - 75) / (120 - 75);
        }else if($umur > 120 && $umur < 150){
            $hasil = (150 - $umur) / (150 - 120);
        }
        return $hasil;
    }

    public function miuUmurDewasa($umur) {
        $hasil = 0.0;
        if ($umur <= 120) {
            $hasil = 0.0;
        } else if ($umur >= 150) {
            $hasil = 1.0;
        } else if ($umur > 120 && $umur < 150) {
            $hasil = ($umur - 120) / (150 - 120);
        }
        return $hasil;
    }

}
