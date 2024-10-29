<?php

namespace App\Charts;

use App\Models\PesananKendaraan;
use Carbon\Carbon;
use marineusde\LarapexCharts\Charts\LineChart as OriginalLineChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class PemesananKendaraanBulananCharts
{
    public function build(): OriginalLineChart
    {
        $year = date('Y');
        $month = date('m');
        for ($i = 1; $i <= $month; $i++) {
            $totalPemesanan = PesananKendaraan::whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
            $monthData[] = Carbon::create()->month($i)->format('F');
            $dataTotalPemesanan[] = $totalPemesanan;
        }
        return (new OriginalLineChart)
            ->setTitle('Pemesanan Kendaraan Bulanan')
            ->setSubtitle('Total Pemesanan Kendaraan Setiap Bulan')
            ->setHeight(300)
            ->addData('Jumlah Pemesanan', $dataTotalPemesanan)
            ->setXAxisOption(new XAxisOption($monthData));
    }
}
