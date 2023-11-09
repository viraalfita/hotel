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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->date('tgl_checkin');
            $table->date('tgl_checkout');
            $table->integer('jumlah_kamar');
            $table->string('nama_pemesan');
            $table->string('email');
            $table->string('no_hp');
            $table->string('nama_tamu');
            $table->foreignId('id_kamar')->constrained('kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_checkin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
