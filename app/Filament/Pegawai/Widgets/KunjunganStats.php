<?php

namespace App\Filament\Pegawai\Widgets;

use App\Models\Kunjungan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KunjunganStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kunjungan', Kunjungan::count())
                ->description('Jumlah semua tamu yang tercatat')
                ->color('success'),

            Stat::make(
                'Kunjungan Bulan Ini',
                Kunjungan::whereMonth('tanggal', now()->month)->count()
            )->description('Data bulan berjalan')->color('info'),

            Stat::make(
                'Kunjungan Hari Ini',
                Kunjungan::whereDate('tanggal', now())->count()
            )->description('Data hari ini')->color('warning'),
        ];
    }
}
