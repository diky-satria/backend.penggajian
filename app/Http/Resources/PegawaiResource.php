<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
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
            'nip' => $this->nip,
            'nama_pegawai' => $this->nama_pegawai,
            'jabatan_id' => $this->jabatan_id,
            'kode_jabatan' => $this->jabatan->kode_jabatan,
            'nama_jabatan' => $this->jabatan->nama_jabatan,
            'golongan_id' => $this->golongan_id,
            'kode_golongan' => $this->golongan->kode_golongan,
            'jenis_kelamin_id' => $this->jenis_kelamin_id,
            'nama_jenis_kelamin' => $this->jenis_kelamin->nama_jenis_kelamin,
            'telepon' => $this->telepon
        ];
    }
}
