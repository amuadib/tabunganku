<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Models\Tabungan;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['petugas_id'] = auth()->id();
        return $data;
    }

    protected function beforeCreate(): void
    {
        $tabungan = Tabungan::where('student_id', $this->data['student_id']);
        if ($tabungan->exists()) {
            $saldo = $tabungan->first()->saldo;
        } else {
            $tabungan = Tabungan::create([
                'student_id' => $this->data['student_id'],
                'saldo' => 0
            ]);
            $saldo = 0;
        }

        //saldo tidak cukup
        if ($this->data['jenis'] == 'p' && $saldo < $this->data['jumlah']) {
            Notification::make()
                ->warning()
                ->title('Saldo tidak cukup!')
                ->body('Maaf, Saldo tabungan tidak mencukupi.')
                ->persistent()
                ->send();

            $this->halt();
        }

        if ($this->data['jenis'] == 'p') {
            $tabungan->decrement('saldo', $this->data['jumlah']);
        } elseif ($this->data['jenis'] == 's') {
            $tabungan->increment('saldo', $this->data['jumlah']);
        }
    }
}
