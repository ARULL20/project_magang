<?php

namespace App\Filament\Pegawai\Resources\KunjunganResource\Pages;

use App\Filament\Pegawai\Resources\KunjunganResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKunjungan extends CreateRecord
{
    protected static string $resource = KunjunganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // redirect ke list
    }
}
