<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $primaryKey = 'media_id';
    protected $table = 'media';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'file_path',
        'caption',
        'mime_type',
        'sort_order',
    ];
}
