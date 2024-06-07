<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Transaksi;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransaksiBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for($i = 1; $i <= $bulan; $i++) {
            $totaltransaksi = Transaksi::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->sum('total');
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalTransaksi[] = $totaltransaksi;
        }
        return $this->chart->lineChart()
            ->setTitle('Data Transaksi Bulanan')
            ->setSubtitle('Data Total Transaksi Setiap Bulan')
            ->addData('Total Transaksi', $dataTotalTransaksi)
            ->setHeight(500)
            ->setXAxis($dataBulan);
    }
}
