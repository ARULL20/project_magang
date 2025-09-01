<?php

namespace App\Filament\Resources\PengajuanZoomResource\Pages;

use App\Filament\Resources\PengajuanZoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengajuanZooms extends ListRecords
{
    protected static string $resource = PengajuanZoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
