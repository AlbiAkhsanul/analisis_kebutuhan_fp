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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->onDelete('cascade');
            $table->string('nama_project', 255);
            $table->date('tanggal_project');
            $table->integer('estimasi_lama');
            $table->bigInteger('rencana_anggaran_produksi');
            $table->bigInteger('rencana_anggaran_biaya');
            $table->boolean('status_penajuan_kebutuhan_material')->default(false);
            $table->boolean('status_inspeksi_logistik')->default(false);
            $table->boolean('astatus_ajuhan_upahan')->default(false);
            $table->boolean('milestone_20')->default(false);
            $table->boolean('milestone_50')->default(false);
            $table->boolean('milestone_80')->default(false);
            $table->boolean('milestone_100')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
