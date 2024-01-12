<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tabungans', function (Blueprint $table) {
            $table->decimal('saldo', 12, 0)->after('student_id');
            $table->dropColumn(['mutasi', 'jumlah']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabungans', function (Blueprint $table) {
            $table->string('mutasi', 1);
            $table->decimal('jumlah', 10, 0);
            $table->dropColumn('saldo');
        });
    }
};
