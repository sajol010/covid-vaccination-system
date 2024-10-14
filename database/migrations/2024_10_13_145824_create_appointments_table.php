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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrant_id')->constrained()->onDelete('cascade');
            $table->foreignId('vaccine_center_id')->constrained()->onDelete('cascade');
            $table->date('scheduled_date');
            $table->integer('status')->default(0)->comment('0-Pending, 1-Approved, 2-Cancelled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
