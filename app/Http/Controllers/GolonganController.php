<?php

namespace App\Http\Controllers;

use App\Http\Resources\GolonganResource;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::orderBy('id', 'DESC')->get();
        return GolonganResource::collection($golongan);
    }

    public function show(Golongan $golongan)
    {
        return new GolonganResource($golongan);
    }

    public function store()
    {
        request()->validate([
            'kode_golongan' => 'required|unique:golongans,kode_golongan',
            'uang_lembur' => 'required|numeric',
            'uang_makan' => 'required|numeric',
            'asuransi_kesehatan' => 'required|numeric'
        ],[
            'kode_golongan.required' => 'Kode golongan harus di isi',
            'kode_golongan.unique' => 'Kode golongan sudah terdaftar',
            'uang_lembur.required' => 'Uang lembur harus di isi',
            'uang_lembur.numeric' => 'Uang lembur harus angka',
            'uang_makan.required' => 'Uang makan harus di isi',
            'uang_makan.numeric' => 'Uang makan harus angka',
            'asuransi_kesehatan.required' => 'Askes harus di isi',
            'asuransi_kesehatan.numeric' => 'Askes harus angka',
        ]);

        $golongan = Golongan::create([
            'kode_golongan' => strtoupper(request('kode_golongan')),
            'uang_lembur' => request('uang_lembur'),
            'uang_makan' => request('uang_makan'),
            'asuransi_kesehatan' => request('asuransi_kesehatan')
        ]);

        return response()->json([
            'message' => 'golongan berhasil ditambahkan',
            'golongan' => new GolonganResource($golongan)
        ]);
    }

    public function edit(Golongan $golongan)
    {
        request()->validate([
            'uang_lembur' => 'required|numeric',
            'uang_makan' => 'required|numeric',
            'asuransi_kesehatan' => 'required|numeric'
        ],[
            'uang_lembur.required' => 'Uang lembur harus di isi',
            'uang_lembur.numeric' => 'Uang lembur harus angka',
            'uang_makan.required' => 'Uang makan harus di isi',
            'uang_makan.numeric' => 'Uang makan harus angka',
            'asuransi_kesehatan.required' => 'Askes harus di isi',
            'asuransi_kesehatan.numeric' => 'Askes harus angka',
        ]);

        $golongan->update([
            'uang_makan' => request('uang_makan'),
            'uang_lembur' => request('uang_lembur'),
            'asuransi_kesehatan' => request('asuransi_kesehatan')
        ]);

        return response()->json([
            'message' => 'golongan berhasil di edit'
        ]);
    }

    public function delete(Golongan $golongan)
    {
        $golongan->delete();

        return response()->json([
            'message' => 'golongan berhasil dihapus'
        ]);
    }
}
