<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function siswa(): BelongsTo
    {
        return $this->BelongsTo(Student::class, 'student_id');
    }
    public function petugas(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'petugas_id');
    }
}
