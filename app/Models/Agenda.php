<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table      = 'agenda';
    protected $primaryKey = 'agenda_id';

    protected $fillable = [
        'judul',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'deskripsi',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'agenda_id')
            ->where('ref_table', 'agenda')
            ->orderBy('sort_order');
    }
}
