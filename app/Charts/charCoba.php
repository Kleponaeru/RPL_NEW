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
            ->select(DB::raw('jns_smph'), DB::raw('SUM(kg_sampah) as total'))
            ->groupBy(DB::raw('jns_smph'))
            ->get();

        // Input data in array
        $yAxis = []; // Values for the Y-axis
        $xAxis = []; // Values for the X-axis

        foreach ($orders as $order) {
            $xAxis[] = $order->jns_smph;
            $yAxis[] = $order->total;
        }

        // Append 'kg' to each label
        $yAxis = array_map(function ($value) {
            return $value . ' kg';
        }, $yAxis);

        return $this->chart->barChart()
            ->setTitle('Bagaimana Perbandingan Sampahmu?')
            ->setSubtitle('Perbandingan sampah organik dan anorganikmu yang diambil.')
            ->addData('Transaksi Tervalidasi', $yAxis)
            ->setLabels($xAxis); // Use setLabels to define the X-axis labels
    }

}
