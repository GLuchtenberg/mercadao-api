<?php

namespace App;

use App\Http\Contracts\ICanBeFiled;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name','description','price','category','fabrication','expiration','manufacturer','measurement_unit','quantity'
    ];


    public function files()
    {
        return $this->morphMany(FileEntry::class,'canbefiled');
    }

}
