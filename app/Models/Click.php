<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'url',
        'date',
        'x',
        'y',
        'web_sites_id',
        'created_at',
        'updated_at',
        'window_width',
        'window_height',
        'document_width',
        'document_height',
    ];
}
