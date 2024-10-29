<?php

namespace App\Http\Controllers;

use App\Models\PesananKendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPemesananKendaraanController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('tanggal_awal') || !$request->has('tanggal_akhir')) {
            return view('features.laporan.laporan_pemesanan_kendaraan');
        }

        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_awal',
        ]);

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        try {
            // Ambil data pemesanan kendaraan berdasarkan tanggal awal dan tanggal akhir
            $pesanan = PesananKendaraan::whereBetween('updated_at', [$tanggalAwal, $tanggalAkhir])
                ->with(['kendaraan', 'driver', 'pengaju', 'penyetuju'])
                ->get();

            // Kelompokkan pesanan berdasarkan tanggal pemesanan
            $groupedPesanan = $pesanan->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_pemesanan)->format('Y-m-d'); // Menggunakan tanggal pemesanan sebagai kunci
            });

            // Membangun ringkasan pesanan per tanggal
            $ringkasanPesanan = [];

            foreach ($groupedPesanan as $tanggal => $pesanans) {
                $ringkasanPesanan[] = [
                    'tanggal' => $tanggal,
                    'total_pesanan' => $pesanans->count(),
                    'total_pending' => $pesanans->where('status', 1)->count(),
                    'total_disetujui' => $pesanans->where('status', 2)->count(),
                    'total_ditolak' => $pesanans->where('status', 3)->count(),
                    'kendaraan_milik_perusahaan' => $pesanans->where('kendaraan.jenis_kepemilikan', 'Milik Perusahaan')->count(),
                    'kendaraan_sewa' => $pesanans->where('kendaraan.jenis_kepemilikan', 'Sewa')->count(),
                    'kendaraan_angkutan_orang' => $pesanans->where('kendaraan.jenis_kendaraan', 'Angkutan Orang')->count(),
                    'kendaraan_angkutan_barang' => $pesanans->where('kendaraan.jenis_kendaraan', 'Angkutan Barang')->count(),

                ];
            }
            $jsonRingkasan = json_encode($ringkasanPesanan);
            $jsonRingkasan = json_decode($jsonRingkasan);
            return view('features.laporan.laporan_pemesanan_kendaraan', compact('jsonRingkasan'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat mencari data laporan pemesanan kendaraan');
        }
    }
}
