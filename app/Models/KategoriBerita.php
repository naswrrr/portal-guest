<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriBerita extends Model
{
    protected $table = 'kategori_berita';
    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi'
    ];

    /**
     * Relasi one-to-many ke tabel berita
     * Satu kategori bisa memiliki banyak berita
     */
    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class, 'kategori_id', 'kategori_id');
    }
}
