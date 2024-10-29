<?php

namespace App\Http\Controllers;

use App\Charts\JenisKendaraanBulananCharts;
use App\Charts\JenisKepemilikanBulananCharts;
use App\Charts\PemesananKendaraanBulananCharts;
use App\Models\PesananKendaraan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(PemesananKendaraanBulananCharts $pesananBulanan, JenisKepemilikanBulananCharts $jenisKepemilikan, JenisKendaraanBulananCharts $jenisKendaraan)
    {
        return view('features.dashboard', ['chart' => $pesananBulanan->build(), 'chartKepemilikan' => $jenisKepemilikan->build(), 'chartJenisKendaraan' => $jenisKendaraan->build()]);
    }
}
