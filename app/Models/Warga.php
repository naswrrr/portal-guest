<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telepon'
    ];
}
