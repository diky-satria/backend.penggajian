<?php

namespace App\Http\Controllers;

use App\Http\Resources\GajiResource;
use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\JabatanResource;
use App\Http\Resources\PegawaiResource;

class GajiController extends Controller
{
    public function index()
    {
        
        $b = request('bulan');
        $t = request('tahun');
        $bulan = $b.$t;
        if($b && $t){
            $kehadiran = DB::select("SELECT pegawais.*, jabatans.nama_jabatan FROM pegawais
                                    JOIN jabatans ON pegawais.jabatan_id=jabatans.id
                                    JOIN golongans ON pegawais.golongan_id=golongans.id
                                    WHERE NOT EXISTS (SELECT * FROM gajis WHERE bulan='$bulan')");
            return response()->json([
                'data' => $kehadiran,
            ]);
        }else{
            return response()->json([
                'data' => null
            ]);
        }
    }

    public function show(Gaji $gaji)
    {
        return new GajiResource($gaji);
    }

    public function kehadiran_detail()
    {
        $b = request('bulan');
        $t = request('tahun');
        $bulan = $b.$t;

        if($b && $t){
            $gaji = Gaji::where('bulan', $bulan)->orderBy('id', 'ASC')->get();
            return GajiResource::collection($gaji);
        }else{
            return response()->json([
                'data' => null
            ]);            
        }

    }

    public function store()
    {
        $bulan = request('bulan');
        $pegawai_id = request('id');
        $sakit = request('sakit');
        $izin = request('izin');
        $alpha = request('alpha');

        $count = count($pegawai_id);

        for($i=0;$i<$count;$i++){
            Gaji::create([
                'bulan' => $bulan,
                'pegawai_id' => $pegawai_id[$i],
                'sakit' => $sakit[$i],
                'izin' => $izin[$i],
                'alpha' => $alpha[$i]
            ]);
        }

        return response()->json([
            'message' => 'kehadiran berhasil di input'
        ]);
    }

    public function edit(Gaji $gaji)
    {
        request()->validate([
            'sakit' => 'required|numeric',
            'izin' => 'required|numeric',
            'alpha' => 'required|numeric'
        ],[
            'sakit.required' => 'Data harus di isi',
            'sakit.numeric' => 'Data harus angka',
            'izin.required' => 'Data harus di isi',
            'izin.numeric' => 'Data harus angka',
            'alpha.required' => 'Data harus di isi',
            'alpha.numeric' => 'Data harus angka'
        ]);

        $gaji->update([
            'sakit' => request('sakit'),
            'izin' => request('izin'),
            'alpha' => request('alpha')
        ]);

        return response()->json([
            'message' => 'kehadiran berhasil di edit'
        ]);
    }
}
