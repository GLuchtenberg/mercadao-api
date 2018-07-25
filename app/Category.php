<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const IMAGE_PATH = 'uploads/categorias/';

    protected $fillable = [
        'name','description','category_image'
    ];

    public function getImagePathAttribute()
    {

        return !empty($this->image) ?  asset(self::IMAGE_PATH. $this->image) : asset(self::IMAGE_PATH.'imagem-padrao.jpg');
    }

}
