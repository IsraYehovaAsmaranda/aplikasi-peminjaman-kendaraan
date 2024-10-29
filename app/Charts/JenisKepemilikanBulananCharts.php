<?php

namespace App\Charts;

use App\Models\PesananKendaraan;
use Carbon\Carbon;
use marineusde\LarapexCharts\Charts\DonutChart as OriginalDonutChart;

class JenisKepemilikanBulananCharts
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
            ->groupBy('kendaraan.jenis_kepemilikan')
            ->map(function ($group) {
                return $group->count();
            });

        $jenisKepemilikan = $data->keys()->toArray();
        $jumlahJenisKepemilikan = $data->values()->toArray();
        return (new OriginalDonutChart)
            ->setTitle('Berdasarkan Jenis Kepemilikan Kendaraan')
            ->setSubtitle("Bulan $monthName tahun $year")
            ->addData($jumlahJenisKepemilikan)
            ->setHeight(300)
            ->setLabels($jenisKepemilikan);
    }
}
