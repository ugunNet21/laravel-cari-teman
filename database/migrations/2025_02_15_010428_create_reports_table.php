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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reported_by')->constrained('users')->onDelete('cascade'); // pelapor
            $table->foreignId('reported_user_id')->constrained('users')->onDelete('cascade'); // yang dilaporkan
            $table->string('reason'); // alasan laporan
            $table->text('description')->nullable(); // deskripsi tambahan
            $table->enum('status', ['pending', 'reviewed', 'resolved'])->default('pending'); // status laporan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
