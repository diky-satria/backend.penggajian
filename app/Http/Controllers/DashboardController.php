<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use App\Http\Resources\JabatanResource;
use App\Http\Resources\GolonganResource;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all()->count();
        $jabatan = Jabatan::all()->count();
        $golongan = Golongan::all()->count();
        $jkL = Pegawai::where('jenis_kelamin_id', 1)->count();
        $jkP = Pegawai::where('jenis_kelamin_id', 2)->count();

        return response()->json([
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'golongan' => $golongan,
            'golonganData' => GolonganResource::collection(Golongan::all()),
            'jabatanData' => JabatanResource::collection(Jabatan::all()),
            'jk' => ['laki' => $jkL, 'perempuan' => $jkP]
        ]);
    }
}
