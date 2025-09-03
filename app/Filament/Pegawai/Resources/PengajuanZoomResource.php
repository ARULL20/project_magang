<?php

namespace App\Filament\Pegawai\Resources;

use App\Filament\Pegawai\Resources\PengajuanZoomResource\Pages;
use App\Models\PengajuanZoom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PengajuanZoomResource extends Resource
{
    protected static ?string $model = PengajuanZoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Manajemen Data';

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

                // Status hanya bisa diatur admin
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'disetujui' => 'Disetujui',
                    ])
                    ->default('pending')
                    ->required()
                    ->visible(fn (): bool => Auth::check() && Auth::user()->role === 'admin')
                    ->disabled(fn (): bool => Auth::check() && Auth::user()->role !== 'admin'),
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
