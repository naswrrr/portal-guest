<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table      = 'berita';
    protected $primaryKey = 'berita_id';
    protected $fillable   = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at',
    ];

    protected $casts = [
        'terbit_at' => 'datetime',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'kategori_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'berita_id')
            ->where('ref_table', 'berita')->latest();
    }

}
