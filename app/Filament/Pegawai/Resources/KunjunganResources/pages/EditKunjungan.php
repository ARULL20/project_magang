<?php

namespace App\Filament\Pegawai\Resources\KunjunganResource\Pages;

use App\Filament\Pegawai\Resources\KunjunganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKunjungan extends EditRecord
{
    protected static string $resource = KunjunganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // redirect ke list
    }
}
