<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaPendaftaran extends Model
{
    //
    protected $table ='biaya_pendaftaran';

    protected $fillable = [
        'nama_biaya',
        'tahun_ajaran',
        'sekolah',
        'harga',
    ];
}
