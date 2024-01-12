<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@local.net',
            'email_verified_at' => $now,
            'password' => Hash::make('4dmin++'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $rombels = [];
        foreach (range(1, 6) as $r) {
            $rombels[] = [
                'id' => $r,
                'nama' => 'Kelas ' . $r,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('rombels')->insert($rombels);
    }
}
