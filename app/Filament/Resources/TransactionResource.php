<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Student;
use App\Models\Transaction;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $modelLabel = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Nama Siswa')
                    ->options(Student::all()->pluck('nama', 'id'))
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),
                Radio::make('jenis')
                    ->options([
                        's' => 'Setoran',
                        'p' => 'Penarikan'
                    ])
                    ->default('s')
                    ->inline()
                    ->inlineLabel(false)
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('jumlah')
                    ->prefix('Rp')
                    ->required()
                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('updated_at')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('siswa.nama')
                    ->searchable(),
                TextColumn::make('siswa.kelas.nama')
                    ->sortable(),
                TextColumn::make('setoran')
                    ->prefix('Rp ')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->state(function ($record) {
                        if ($record->jenis == 's') {
                            return $record->jumlah;
                        }
                    }),
                TextColumn::make('penarikan')
                    ->prefix('Rp ')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->state(function ($record) {
                        if ($record->jenis == 'p') {
                            return $record->jumlah;
                        }
                    }),
                TextColumn::make('petugas.name'),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        if ($record->jenis == 's') {
                            $record->siswa->tabungan->decrement('saldo', $record->jumlah);
                        } elseif ($record->jenis == 'p') {
                            $record->siswa->tabungan->increment('saldo', $record->jumlah);
                        }
                    }),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateHeading('Belum ada transaksi');
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
