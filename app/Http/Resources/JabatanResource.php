<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JabatanResource extends JsonResource
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
            'nama_jabatan' => $this->nama_jabatan,
            'kode_jabatan' => $this->kode_jabatan,
            'gaji_pokok' => $this->gaji_pokok,
            'tunjangan_jabatan' => $this->tunjangan_jabatan
        ];
    }
}
