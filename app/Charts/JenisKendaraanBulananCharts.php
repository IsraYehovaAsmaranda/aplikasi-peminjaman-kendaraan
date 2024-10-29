<?php

namespace App\Charts;

use App\Models\PesananKendaraan;
use Carbon\Carbon;
use marineusde\LarapexCharts\Charts\DonutChart as OriginalDonutChart;

class JenisKendaraanBulananCharts
{
    public function build(): OriginalDonutChart
    {
        $year = date('Y');
        $month = date('m');
        $monthName = Carbon::create()->month((int)$month)->format('F');
        $data = PesananKendaraan::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->with('kendaraan')
            ->get()
            ->groupBy('kendaraan.jenis_kendaraan')
            ->map(function ($group) {
                return $group->count();
            });

        $jenisKendaraan = $data->keys()->toArray();
        $jumlahJenisKendaraan = $data->values()->toArray();
        return (new OriginalDonutChart)
            ->setTitle('Pemesanan Berdasarkan Jenis Kendaraan')
            ->setSubtitle("Bulan $monthName tahun $year")
            ->addData($jumlahJenisKendaraan)
            ->setHeight(300)
            ->setLabels($jenisKendaraan);
    }
}
