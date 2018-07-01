<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const IMAGE_PATH = 'uploads/produtos/';

    protected $fillable = [
        'name','description','price','category','fabrication','expiration'
    ];

    public function getImagePathAttribute()
    {

        return !empty($this->image) ?  asset(self::IMAGE_PATH. $this->image) : asset(self::IMAGE_PATH.'imagem-padrao.jpg');
    }
}
