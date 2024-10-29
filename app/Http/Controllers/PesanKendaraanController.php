<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\PesananKendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanKendaraanController extends Controller
{
    public function index()
    {
        $dataPesanan = PesananKendaraan::all();
        // dd($dataPesanan);
        return view('features.pemesanan_kendaraan.pesan_kendaraan', compact('dataPesanan'));
    }

    public function indexTambahPesanan()
    {
        $kendaraan = Kendaraan::all();
        $driver = Driver::all();
        $penyetuju = User::where('role_id', '2')->get();
        return view('features.pemesanan_kendaraan.tambah_pesanan', compact('kendaraan', 'driver', 'penyetuju'));
    }

    public function indexEditPesanan(string $id)
    {
        $id = decrypt($id);
        try {
            $pesanan = PesananKendaraan::find($id);
            if (!$pesanan) {
                return redirect()->back()->withErrors('Pesanan kendaraan tidak ditemukan');
            }
            $kendaraan = Kendaraan::all();
            $driver = Driver::all();
            $penyetuju = User::where('role_id', '2')->get();
            return view('features.pemesanan_kendaraan.edit_pesanan', compact('pesanan', 'kendaraan', 'driver', 'penyetuju', 'id'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function addPesanan(Request $request)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'kendaraan' => 'required|exists:kendaraan,id',
            'driver' => 'required|exists:driver,id',
            'penyetuju' => 'required|exists:users,id',
        ]);

        try {
            $newPesanan = PesananKendaraan::create([
                'id_kendaraan' => $request->kendaraan,
                'id_driver' => $request->driver,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'pihak_penyetuju' => $request->penyetuju,
                'id_pengaju' => Auth::id(),
                'status' => 1,
            ]);
            return redirect()->route('pesanKendaraanPage')->with('success', 'Pesanan kendaraan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menambah pesanan kendaraan');
        }
    }

    public function editPesanan(Request $request, string $id)
    {
        $id = decrypt($id);
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'kendaraan' => 'required|exists:kendaraan,id',
            'driver' => 'required|exists:driver,id',
            'penyetuju' => 'required|exists:users,id',
        ]);

        try {
            $pesanan = PesananKendaraan::find($id);
            if (!$pesanan) {
                return redirect()->back()->withErrors('Pesanan kendaraan tidak ditemukan');
            }
            $pesanan->id_kendaraan = $request->kendaraan;
            $pesanan->id_driver = $request->driver;
            $pesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
            $pesanan->pihak_penyetuju = $request->penyetuju;
            $pesanan->save();
            return redirect()->route('pesanKendaraanPage')->with('success', 'Pesanan kendaraan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal mengubah pesanan kendaraan');
        }
    }

    public function verifikasiPesanan(Request $request, string $id)
    {
        $id = decrypt($id);
        if (!($request->verifikasi == 2 || $request->verifikasi == 3)) {
            return redirect()->back()->withErrors('Hanya bisa tolak dan verifikasi');
        }

        try {
            $pesanan = PesananKendaraan::find($id);
            if (!$pesanan) {
                return redirect()->back()->withErrors('Pesanan kendaraan tidak ditemukan');
            }
            $pesanan->status = $request->verifikasi;
            $pesanan->save();
            return redirect()->route('pesanKendaraanPage')->with('success', 'Status pesanan kendaraan berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    function cariKendaraan(Request $request)
    {
        $request->validate([
            'jenis_kepemilikan' => 'required|string',
            'jenis_kendaraan' => 'required|string',
        ]);

        $jenisKepemilikan = $request->jenis_kepemilikan;
        $jenisKendaraan = $request->jenis_kendaraan;

        try {
            $kendaraan = Kendaraan::where('jenis_kepemilikan', $jenisKepemilikan)->where('jenis_kendaraan', $jenisKendaraan)->get();
            return response()->json([
                'message' => 'Berhasil mencari kendaraan',
                'status' => 'success',
                'data' => $kendaraan,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Gagal mencari kendaraan',
                'status' => 'error',
            ]);
        }
    }
}
