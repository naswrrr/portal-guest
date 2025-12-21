<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';

    protected $fillable = [
        'judul',
        'deskripsi',
    ];

    /**
     * Relasi media (KONSISTEN DENGAN AGENDA)
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'galeri_id')
            ->where('ref_table', 'galeri')
            ->orderBy('sort_order');
    }
}
