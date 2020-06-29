<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    public $timestamps = true;

    protected $fillable = [
        'client', 'product', 'price', 'user'
    ];
}
