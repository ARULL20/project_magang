<?php

namespace App\Filament\Pegawai\Widgets;

use App\Models\PengajuanZoom;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PengajuanStats extends BaseWidget
{
    // heading harus non-static
    protected ?string $heading = 'Pengajuan Zoom';

    // columnSpan juga non-static supaya cocok dengan parent class
    protected int|string|array $columnSpan = 2;

    protected function getStats(): array
    {
        $data = PengajuanZoom::select('status')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('status')
            ->get();

        $stats = [];

        foreach ($data as $row) {
            $label = ucfirst($row->status);
            $valueText = $row->total . ' Pengajuan';

            $statusLower = strtolower($row->status);
            if (in_array($statusLower, ['pending', 'menunggu'])) {
                $color = 'warning';
                $icon = 'heroicon-m-clock';
                $desc = 'Menunggu verifikasi';
            } elseif (in_array($statusLower, ['disetujui', 'approved', 'accept'])) {
                $color = 'success';
                $icon = 'heroicon-m-check-circle';
                $desc = 'Sudah disetujui';
            } elseif (in_array($statusLower, ['ditolak', 'rejected'])) {
                $color = 'danger';
                $icon = 'heroicon-m-x-circle';
                $desc = 'Ditolak';
            } else {
                $color = 'primary';
                $icon = 'heroicon-m-document';
                $desc = 'Kategori: ' . $label;
            }

            $stats[] = Stat::make($label, $valueText)
                ->description($desc)
                ->descriptionIcon($icon)
                ->color($color);
        }

        return $stats;
    }
}
