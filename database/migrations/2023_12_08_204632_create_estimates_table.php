<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->default('New estimate');
            $table
                ->integer('hourly_rate')
                ->default(50)
                ->nullable();
            $table->boolean('show_notes')->default(true);
            $table->boolean('public')->default(false);
            $table->uuid('user_id');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
