<?php

namespace App\Filament\Resources\PengajuanZoomResource\Pages;

use App\Filament\Resources\PengajuanZoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengajuanZoom extends EditRecord
{
    protected static string $resource = PengajuanZoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
