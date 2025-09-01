<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrasiResource\Pages;
use App\Filament\Resources\RegistrasiResource\RelationManagers;
use App\Models\Registrasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrasiResource extends Resource
{
    protected static ?string $model = Registrasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Tambahan untuk ubah label menu & judul
    protected static ?string $navigationLabel = 'Registrasi';

    public static function getModelLabel(): string
    {
        return 'Registrasi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Registrasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('nip')
                    ->label('NIP')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('nip')->label('NIP')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Registrasi')
                    ->dateTime('d M Y H:i'),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrasis::route('/'),
            'create' => Pages\CreateRegistrasi::route('/create'),
            'edit' => Pages\EditRegistrasi::route('/{record}/edit'),
        ];
    }
}
