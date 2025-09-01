<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KunjunganResource\Pages;
use App\Models\Kunjungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KunjunganResource extends Resource
{
    protected static ?string $model = Kunjungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Kunjungan Dinas';
    protected static ?string $navigationGroup = 'Manajemen Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tamu')
                    ->label('Nama Tamu')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('instansi')
                    ->label('Instansi Asal')
                    ->required()
                    ->maxLength(150),

                Forms\Components\TextInput::make('tujuan')
                    ->label('Tujuan Kunjungan')
                    ->required()
                    ->maxLength(150),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                Forms\Components\TimePicker::make('waktu')
                    ->label('Waktu')
                    ->required(),

                Forms\Components\TextInput::make('pegawai_tujuan')
                    ->label('Pegawai yang Ditemui')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan Tambahan')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_tamu')
                    ->label('Nama Tamu')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('instansi')
                    ->label('Instansi')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tujuan')
                    ->label('Tujuan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('waktu')
                    ->label('Waktu')
                    ->time('H:i'),

                Tables\Columns\TextColumn::make('pegawai_tujuan')
                    ->label('Pegawai Tujuan'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('instansi')
                    ->options(Kunjungan::pluck('instansi', 'instansi')->unique()->toArray()),

                Tables\Filters\SelectFilter::make('pegawai_tujuan')
                    ->options(Kunjungan::pluck('pegawai_tujuan', 'pegawai_tujuan')->unique()->toArray()),

                Tables\Filters\Filter::make('tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q, $date) => $q->whereDate('tanggal', '>=', $date))
                            ->when($data['until'], fn($q, $date) => $q->whereDate('tanggal', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKunjungans::route('/'),
            'create' => Pages\CreateKunjungan::route('/create'),
            'edit' => Pages\EditKunjungan::route('/{record}/edit'),
        ];
    }
}
