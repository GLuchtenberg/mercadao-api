<?php

namespace App;

use App\Http\Contracts\ICanBeFiled;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name','description','price','category_id','fabrication','expiration','manufacturer','measurement_unit','quantity','barcode'
    ];


    public function files()
    {
        return $this->morphMany(FileEntry::class,'canbefiled');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

}
