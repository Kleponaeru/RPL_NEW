<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class charCoba
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Now, the DB class is recognized
        $orders = DB::table('orders')
            ->select(DB::raw('jns_smph'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('jns_smph'))
            ->get();

        // Input data in array
        $yAxis = []; // Values for the Y-axis
        $xAxis = []; // Values for the X-axis

        foreach ($orders as $order) {
            $xAxis[] = $order->jns_smph;
            $yAxis[] = $order->total;
        }

        return $this->chart->barChart()
            ->setTitle('Grafik jenis sampah.')
            ->setSubtitle('Seluruh transaksi yang telah anda buat.')
            ->addData('Transaksi Tervalidasi', $yAxis)
            ->setXAxis($xAxis);
    }
}
