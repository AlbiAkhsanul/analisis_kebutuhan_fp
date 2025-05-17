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
        Schema::table('letters', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_surat',
                'file_surat'
            ]);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_invoice',
                'file_invoice'
            ]);
        });

        Schema::table('project_images', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_foto',
                'file_foto'
            ]);
        });

        Schema::table('letters', function (Blueprint $table) {
            $table->date('tanggal_dokumen');
            $table->string('file_dokumen', 255);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->date('tanggal_dokumen');
            $table->string('file_dokumen', 255);
        });

        Schema::table('project_images', function (Blueprint $table) {
            $table->date('tanggal_dokumen');
            $table->string('file_dokumen', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_dokumen',
                'file_dokumen'
            ]);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_dokumen',
                'file_dokumen'
            ]);
        });

        Schema::table('project_images', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_dokumen',
                'file_dokumen'
            ]);
        });

        Schema::table('letters', function (Blueprint $table) {
            $table->date('tanggal_surat');
            $table->string('file_surat', 255);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->date('tanggal_invoice');
            $table->string('file_invoice', 255);
        });

        Schema::table('project_images', function (Blueprint $table) {
            $table->date('tanggal_foto');
            $table->string('file_foto', 255);
        });
    }
};
