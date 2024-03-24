<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimate_section_rows', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type')->default('default');
            $table->integer('hours')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('note')->nullable();
            $table->integer('position')->default(0);
            $table->uuid('estimate_section_id');
            $table
                ->foreign('estimate_section_id')
                ->references('id')
                ->on('estimate_sections')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimate_section_rows');
    }
};
