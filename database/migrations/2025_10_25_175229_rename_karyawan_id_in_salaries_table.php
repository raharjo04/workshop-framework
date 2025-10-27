<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            // Hapus foreign key constraint lama
            $table->dropForeign(['karyawan_id']);
            // Ganti nama kolom
            $table->renameColumn('karyawan_id', 'employee_id');
        });

        // Tambahkan kembali foreign key constraint dengan nama baru
        Schema::table('salaries', function (Blueprint $table) {
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            // Hapus foreign key constraint baru
            $table->dropForeign(['employee_id']);
            // Ganti nama kolom kembali
            $table->renameColumn('employee_id', 'karyawan_id');
        });

        // Tambahkan kembali foreign key constraint dengan nama lama
        Schema::table('salaries', function (Blueprint $table) {
            $table->foreign('karyawan_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }
};