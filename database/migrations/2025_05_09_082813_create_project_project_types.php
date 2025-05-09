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
        Schema::create('project_project_types', function (Blueprint $table) {
            $table->foreignId('project_type_id')->constrained('project_types')->onDelete('restrict');
            $table->foreignId('project_id')->constrained()->onDelete('restrict');

            $table->primary(['project_id', 'project_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_project_types');
    }
};
