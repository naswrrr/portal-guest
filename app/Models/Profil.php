<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table      = 'profil';
    protected $primaryKey = 'profil_id';

    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat_kantor',
        'email',
        'telepon',
        'visi',
        'misi',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'profil_id')
            ->where('ref_table', 'profil');
    }

}
