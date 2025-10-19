<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'status',
        'terbit_at'
    ];

    protected $casts = [
        'terbit_at' => 'datetime'
    ];

    // Auto generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
            // Ensure slug is unique
            $originalSlug = $berita->slug;
            $count = 1;
            while (static::where('slug', $berita->slug)->exists()) {
                $berita->slug = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
                // Ensure slug is unique
                $originalSlug = $berita->slug;
                $count = 1;
                while (static::where('slug', $berita->slug)->where('berita_id', '!=', $berita->berita_id)->exists()) {
                    $berita->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

    // Relasi ke media untuk cover/foto
    public function cover()
    {
        return $this->morphOne(Media::class, 'model')
                    ->where('ref_table', 'berita');
    }

    // Scope untuk berita yang sudah terbit
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('terbit_at', '<=', now());
    }
}
