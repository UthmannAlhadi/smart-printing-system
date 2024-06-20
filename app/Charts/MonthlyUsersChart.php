<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->BarChart()
            ->setTitle('Income. ')
            ->setSubtitle('$2.5K.')
            ->addData('Monthly Income', [46, 39, 26, 44, 43, 30, 46, 49, 43, 24, 48, 23])
            ->addData('Monthly Cost', [40, 33, 18, 24, 28, 10, 16, 29, 13, 24, 18, 13])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
