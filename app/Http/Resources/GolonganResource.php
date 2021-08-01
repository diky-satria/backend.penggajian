<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GolonganResource extends JsonResource
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
            'kode_golongan' => $this->kode_golongan,
            'uang_makan' => $this->uang_makan,
            'uang_lembur' => $this->uang_lembur,
            'asuransi_kesehatan' => $this->asuransi_kesehatan
        ];
    }
}
