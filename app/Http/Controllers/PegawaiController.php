<?php

namespace App\Http\Controllers;

use App\Http\Resources\GolonganResource;
use App\Http\Resources\JabatanResource;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use App\Http\Resources\PegawaiResource;
use App\Models\JenisKelamin;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::orderBy('id', 'DESC')->get();
        return PegawaiResource::collection($pegawai);
    }

    public function show(Pegawai $pegawai)
    {
        return new PegawaiResource($pegawai);
    }

    public function det()
    {
        $jabatan = Jabatan::orderBy('kode_jabatan', 'ASC')->get();
        $golongan = Golongan::orderBy('kode_golongan')->get();
        $jk = JenisKelamin::orderBy('id', 'ASC')->get();

        return response()->json([
            'jabatan' => JabatanResource::collection($jabatan),
            'golongan' => GolonganResource::collection($golongan),
            'jk' => $jk
        ]);
    }

    public function store()
    {
        request()->validate([
            'nip' => 'required|unique:pegawais,nip',
            'nama_pegawai' => 'required',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'jenis_kelamin_id' => 'required',
            'telepon' => 'required'
        ],[
            'nip.required' => 'NIP harus di isi',
            'nip.unique' => 'NIP sudah terdaftar',
            'nama_pegawai.required' => 'Nama pegawai harus di isi',
            'jabatan_id.required' => 'Jabatan harus di pilih',
            'golongan_id.required' => 'Golongan harus di pilih',
            'jenis_kelamin_id.required' => 'Jenis kelamin harus di pilih',
            'telepon.required' => 'Telepon harus di isi'
        ]);

        $pegawai = Pegawai::create([
            'nip' => strtoupper(request('nip')),
            'nama_pegawai' => ucwords(request('nama_pegawai')),
            'jabatan_id' => request('jabatan_id'),
            'golongan_id' => request('golongan_id'),
            'jenis_kelamin_id' => request('jenis_kelamin_id'),
            'telepon' => request('telepon')
        ]);

        return response()->json([
            'message' => 'pegawai berhasil ditambahkan',
            'pegawai' => new PegawaiResource($pegawai)
        ]);
    }

    public function edit(Pegawai $pegawai)
    {
        request()->validate([
            'nama_pegawai' => 'required',
            'telepon' => 'required'
        ],[
            'nama_pegawai.required' => 'Nama pegawai harus di isi',
            'telepon.required' => 'Telepon harus di isi'
        ]);

        $pegawai->update([
            'nama_pegawai' => ucwords(request('nama_pegawai')),
            'jabatan_id' => request('jabatan_id'),
            'golongan_id' => request('golongan_id'),
            'jenis_kelamin_id' => request('jenis_kelamin_id'),
            'telepon' => request('telepon')
        ]);

        return response()->json([
            'message' => 'pegawai berhasil di edit'
        ]);
    }

    public function delete(Pegawai $pegawai)
    {
        $pegawai->delete();

        return response()->json([
            'message' => 'pegawai berhasil dihapus'
        ]);
    }

}
