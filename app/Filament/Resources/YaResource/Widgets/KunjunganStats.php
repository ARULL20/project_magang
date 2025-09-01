<?php

namespace App\Filament\Widgets;

use App\Models\Kunjungan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class KunjunganStats extends ChartWidget
{
    protected static ?string $heading = 'Statistik Kunjungan per Bulan';

    protected function getData(): array
    {
        $data = Kunjungan::select(
            DB::raw('MONTH(tanggal) as bulan'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan')
        ->toArray();

        // Label bulan (1–12)
        $labels = [];
        $values = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date("F", mktime(0, 0, 0, $i, 1)); // Nama bulan
            $values[] = $data[$i] ?? 0; // kalau tidak ada isi 0
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kunjungan',
                    'data' => $values,
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // karena tadi pilih bar chart
    }
}
