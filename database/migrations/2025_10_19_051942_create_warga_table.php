<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('warga', function (Blueprint $table) {
        $table->increments('warga_id');
        $table->string('nama', 100);
        $table->string('nik', 16)->unique();
        $table->string('no_kk', 16);
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->text('alamat');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('warga');
    }
};
