<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('media_id');      // PK auto increment
            $table->string('ref_table');            // contoh: 'berita', 'jadwal_posyandu', 'lampiran_dokumen', dll
            $table->unsignedBigInteger('ref_id');  // id pada tabel referensi (contoh: berita_id)
            $table->string('file_name');            // simpan nama file atau path relatif (mis. media/berita/xxx.png)
            $table->string('caption')->nullable();
            $table->string('mime_type')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();                   // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
