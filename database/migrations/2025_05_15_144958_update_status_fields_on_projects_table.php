<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'status_penajuan_kebutuhan_material',
                'status_inspeksi_logistik',
                'status_ajuhan_upahan',
                'milestone_20',
                'milestone_50',
                'milestone_80',
                'milestone_100',
            ]);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status_penajuan_kebutuhan_material', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->enum('status_inspeksi_logistik', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->enum('status_ajuhan_upahan', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->enum('status_milestone_20', ['pending', 'hutang', 'piutang', 'lunas'])->default('pending');
            $table->enum('status_milestone_50', ['pending', 'hutang', 'piutang', 'lunas'])->default('pending');
            $table->enum('status_milestone_80', ['pending', 'hutang', 'piutang', 'lunas'])->default('pending');
            $table->enum('status_milestone_100', ['pending', 'hutang', 'piutang', 'lunas'])->default('pending');
            $table->date('tanggal_milestone_20')->nullable();
            $table->date('tanggal_milestone_50')->nullable();
            $table->date('tanggal_milestone_80')->nullable();
            $table->date('tanggal_milestone_100')->nullable();
            $table->enum('status_proyek', ['pending', 'aktif', 'selesai', 'batal'])->default('pending');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rollback to boolean
            $table->dropColumn([
                'status_penajuan_kebutuhan_material',
                'status_inspeksi_logistik',
                'status_ajuhan_upahan',
                'status_milestone_20',
                'status_milestone_50',
                'status_milestone_80',
                'status_milestone_100',
                'tanggal_milestone_20',
                'tanggal_milestone_50',
                'tanggal_milestone_80',
                'tanggal_milestone_100',
                'status_proyek'
            ]);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('status_penajuan_kebutuhan_material')->default(false);
            $table->boolean('status_inspeksi_logistik')->default(false);
            $table->boolean('status_ajuhan_upahan')->default(false);
            $table->boolean('milestone_20')->default(false);
            $table->boolean('milestone_50')->default(false);
            $table->boolean('milestone_80')->default(false);
            $table->boolean('milestone_100')->default(false);
        });
    }
};
