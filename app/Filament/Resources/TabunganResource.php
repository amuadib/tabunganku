<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TabunganResource\Pages;
use App\Models\Tabungan;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TabunganResource extends Resource
{
    protected static ?string $model = Tabungan::class;

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $modelLabel = 'Tabungan';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama'),
                TextColumn::make('siswa.kelas.nama'),
                TextColumn::make('saldo')
                    ->prefix('Rp ')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListTabungans::route('/'),
        ];
    }
}
