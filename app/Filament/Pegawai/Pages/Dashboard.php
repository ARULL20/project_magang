<?php

namespace App\Filament\Pegawai\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Pegawai\Widgets\KunjunganStats::class,
            \App\Filament\Pegawai\Widgets\KunjunganChart::class,
            \App\Filament\Pegawai\Widgets\PengajuanStats::class,

        ];
    }
}
