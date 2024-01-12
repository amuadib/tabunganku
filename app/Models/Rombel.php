<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rombel extends Model
{
    public function anggota(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
