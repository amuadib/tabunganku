<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;
    protected function getStats(): array
    {
        $tabungan = \App\Models\Tabungan::all();
        return [
            Stat::make('Jumlah Siswa', \App\Models\Student::count())
                ->description('Total siswa yang terdaftar')
                ->descriptionIcon('heroicon-o-users'),
            Stat::make('Jumlah Tabungan', $tabungan->count())
                ->description('Total siswa yang menabung')
                ->descriptionIcon('heroicon-o-calculator'),
            Stat::make('Jumlah Saldo Tabungan', 'Rp ' . number_format($tabungan->sum('saldo'), 0, ',', '.'))
                ->description('Total uang tabungan')
                ->descriptionIcon('heroicon-o-banknotes'),
        ];
    }
}
