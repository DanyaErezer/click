<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'web_sites_id',
    ];
    public function webSite()
    {
        return $this->belongsTo(WebSite::class, 'web_sites_id');
    }

}
