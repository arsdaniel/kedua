<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SantriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nama_belakang' => $this->nama_belakang,
            'no_pendaftaran' => $this->no_pendaftaran,
            'foto' => $this->foto,
            'email' => $this->email,
            'sekolah_sekarang' => $this->sekolah_sekarang,
            'roles' => array_map(
                function ($role) {
                    return $role['name'];
                },
                $this->roles->toArray()
            ),
            'permissions' => array_map(
                function ($permission) {
                    return $permission['name'];
                },
                $this->getAllPermissions()->toArray()
            ),
            'avatar' => 'https://i.pravatar.cc',
        ];
    }
}
