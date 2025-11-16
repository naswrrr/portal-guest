<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('berita_id');
            $table->foreignId('kategori_id')->constrained('kategori_berita', 'kategori_id')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('isi_html');
            $table->string('penulis');
            $table->enum('status', ['draft', 'terbit'])->default('draft');
            $table->timestamp('terbit_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
}
