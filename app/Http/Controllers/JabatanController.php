<?php

namespace App\Http\Controllers;

use App\Http\Resources\JabatanResource;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::orderBy('id', 'DESC')->get();
        return JabatanResource::collection($jabatan);
    }

    public function show(Jabatan $jabatan)
    {
        return new JabatanResource($jabatan);
    }

    public function store()
    {
        request()->validate([
            'kode_jabatan' => 'required|unique:jabatans,kode_jabatan',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric'
        ],[
            'kode_jabatan.required' => 'Kode jabatan harus di isi',
            'kode_jabatan.unique' => 'kode jabatan sudah terdaftar',
            'nama_jabatan.required' => 'Nama jabatan harus di isi',
            'gaji_pokok.required' => 'Gaji pokok harus di isi',
            'gaji_pokok.numeric' => 'Gaji pokok harus angka',
            'tunjangan_jabatan.required' => 'Tunjangan jabatan harus di isi',
            'tunjangan_jabatan.numeric' => 'Tunjangan jabatan harus angka'
        ]);

        $jabatan = Jabatan::create([
            'kode_jabatan' => strtoupper(request('kode_jabatan')),
            'nama_jabatan' => ucwords(request('nama_jabatan')),
            'gaji_pokok' => request('gaji_pokok'),
            'tunjangan_jabatan' => request('tunjangan_jabatan')
        ]);

        return response()->json([
            'message' => 'jabatan berhasil ditambahkan',
            'jabatan' => new JabatanResource($jabatan)
        ]);
    }

    public function edit(Jabatan $jabatan)
    {
        request()->validate([
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric'
        ],[
            'nama_jabatan.required' => 'Nama jabatan harus di isi',
            'gaji_pokok.required' => 'Gaji pokok harus di isi',
            'gaji_pokok.numeric' => 'Gaji pokok harus angka',
            'tunjangan_jabatan.required' => 'Tunjangan jabatan harus di isi',
            'tunjangan_jabatan.numeric' => 'Tunjangan jabatan harus angka'
        ]);
        
        $jabatan->update([
            'nama_jabatan' => ucwords(request('nama_jabatan')),
            'gaji_pokok' => request('gaji_pokok'),
            'tunjangan_jabatan' => request('tunjangan_jabatan')
        ]);

        return response()->json([
            'message' => 'jabatan berhasil diedit'
        ]);
    }

    public function delete(Jabatan $jabatan)
    {
        $jabatan->delete();

        return response()->json([
            'message' => 'jabatan berhasil dihapus'
        ]);
    }
}
