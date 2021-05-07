<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BiayaPendaftaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_biaya' => $this->nama_biaya,
            'tahun_ajaran' => $this->tahun_ajaran,
            'sekolah' => $this->sekolah,
            'harga' => $this->harga,
        ];
    }
}
