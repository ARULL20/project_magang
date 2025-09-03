<?php

namespace App\Filament\Resources\PengajuanZoomResource\Pages;

use App\Filament\Resources\PengajuanZoomResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePengajuanZoom extends CreateRecord
{
    protected static string $resource = PengajuanZoomResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
