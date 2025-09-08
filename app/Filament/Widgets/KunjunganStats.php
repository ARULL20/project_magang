<?php

namespace App\Filament\Widgets;

use App\Models\Kunjungan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KunjunganStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // total semua
            Stat::make('Total Kunjungan', Kunjungan::count())
                ->description('Jumlah semua tamu yang tercatat')
                ->color('success'),

            // hanya bulan berjalan
            Stat::make(
                'Kunjungan Bulan Ini',
                Kunjungan::whereMonth('tanggal', now()->month)->count()
            )
                ->description('Data bulan berjalan')
                ->color('info'),

            // hanya tanggal hari ini
            Stat::make(
                'Kunjungan Hari Ini',
                Kunjungan::whereDate('tanggal', now()->toDateString())->count()
            )
                ->description('Data kunjungan tanggal ' . now()->format('d M Y'))
                ->color('warning'),
        ];
    }
}
