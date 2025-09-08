<?php

namespace App\Filament\Pegawai\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Notifications\Notification;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    // Jalankan saat halaman di-boot (pertama kali load)
    public function boot(): void
    {
        $message = session()->pull('login_success_message');

        if ($message) {
            Notification::make()
                ->title('Login Berhasil')
                ->body($message)
                ->success()
                ->send();
        }
    }

    public function getWidgets(): array
    {
        return [
            \App\Filament\Pegawai\Widgets\KunjunganStats::class,
            \App\Filament\Pegawai\Widgets\KunjunganChart::class,
            \App\Filament\Pegawai\Widgets\PengajuanStats::class,
        ];
    }
}
