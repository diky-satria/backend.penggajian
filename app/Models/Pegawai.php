<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['nip','nama_pegawai','jabatan_id','golongan_id','jenis_kelamin_id','telepon'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function jenis_kelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
}
