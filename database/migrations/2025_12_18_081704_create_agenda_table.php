<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('agenda_id');
            $table->string('judul');
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('penyelenggara');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
