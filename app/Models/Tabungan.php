<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    public function siswa(): BelongsTo
    {
        return $this->BelongsTo(Student::class, 'student_id');
    }
}
