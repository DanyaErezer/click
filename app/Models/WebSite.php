<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebSite extends Model
{
    protected $table = 'web_sites';

    protected $fillable = [
        'name',
        'url',
    ];

    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class, 'web_sites_id', 'id');
    }
}
