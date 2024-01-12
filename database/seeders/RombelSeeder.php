<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rombels = [];
        foreach (range(1, 6) as $r) {
            $rombels[] = ['id' => $r, 'nama' => 'Kelas ' . $r];
        }
        DB::table('rombels')->insert([$rombels]);
    }
}
