<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    protected $table = 'web_sites';

    protected $fillable = [
        'name',
        'url',
    ];
}
