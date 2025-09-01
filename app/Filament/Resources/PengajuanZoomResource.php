<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanZoomResource\Pages;
use App\Models\PengajuanZoom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengajuanZoomResource extends Resource
{
    protected static ?string $model = PengajuanZoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera'; // ganti biar pas dengan zoom
    protected static ?string $navigationGroup = 'Manajemen Data'; // supaya rapi masuk menu "Manajemen Data"

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nama_pemohon')
                ->label('Nama Pemohon')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('instansi')
                ->label('Instansi')
                ->maxLength(255),

            Forms\Components\DateTimePicker::make('jadwal')
                ->label('Jadwal Zoom')
                ->required(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'pending' => 'Pending',
                    'disetujui' => 'Disetujui',
                ])
                ->default('pending')
                ->required(),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_pemohon')->label('Nama Pemohon')->searchable(),
            Tables\Columns\TextColumn::make('instansi')->label('Instansi')->searchable(),
            Tables\Columns\TextColumn::make('jadwal')->label('Jadwal')->dateTime('d M Y H:i'),
            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'disetujui',
                ]),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanZooms::route('/'),
            'create' => Pages\CreatePengajuanZoom::route('/create'),
            'edit' => Pages\EditPengajuanZoom::route('/{record}/edit'),
        ];
    }
}
