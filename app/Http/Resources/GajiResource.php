<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GajiResource extends JsonResource
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
            'bulan' => $this->bulan,
            'pegawai_id' => $this->pegawai_id,
            'nip' => $this->pegawai->nip,
            'jabatan' => $this->pegawai->jabatan->nama_jabatan, //add
            'gaji_pokok' => $this->pegawai->jabatan->gaji_pokok, //add
            'tunjangan_jabatan' => $this->pegawai->jabatan->tunjangan_jabatan, //add
            'golongan' => $this->pegawai->golongan->kode_golongan, //add
            'asuransi_kesehatan' => $this->pegawai->golongan->asuransi_kesehatan, //add
            'nama_pegawai' => $this->pegawai->nama_pegawai,
            'sakit' => $this->sakit,
            'izin' => $this->izin,
            'alpha' => $this->alpha
        ];
    }
}
