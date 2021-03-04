<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ // o que não estiver assinalado no fillable, não será passado a informação (segurança)
        'name', 'price', 'description'
    ];
}
