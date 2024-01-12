<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function transaksi(): HasMany
    {
        return $this->HasMany(Transaction::class, 'student_id');
    }
    public function tabungan(): HasOne
    {
        return $this->HasOne(Tabungan::class, 'student_id');
    }
    public function kelas(): BelongsTo
    {
        return $this->BelongsTo(Rombel::class, 'rombel_id');
    }
}
