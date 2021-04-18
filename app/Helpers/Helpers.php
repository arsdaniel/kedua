<?php

use App\Laravue\Models\User;



function getnoPendaftaran(){
    $awal = "WS" . date('Ym');
    $noUrutAkhir = User::max('no_pendaftaran');
    $kode = intval(substr($noUrutAkhir, 8));
    $kodelama = substr($noUrutAkhir,0,8 );
    $no = 1;
    if($awal == $kodelama) {
        $awal =  $awal .sprintf("%04s", abs($kode + 1)) ;
    }else{
        $awal = $awal  . sprintf("%04s", $no) ;
    }

    return $awal;

}
