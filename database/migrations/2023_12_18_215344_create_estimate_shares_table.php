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
        Schema::create('estimate_shares', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('estimate_id');
            $table->string('user_email');
            $table->timestamps();
            $table
                ->foreign('estimate_id')
                ->references('id')
                ->on('estimates')
                ->onDelete('cascade');
            $table->unique(['estimate_id', 'user_email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_shares');
    }
};
