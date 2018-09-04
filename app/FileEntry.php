<?php

namespace App;

use App\Http\Contracts\IFileSystem;
use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    //

    protected $fillable = ['filename', 'mime', 'path', 'size'];


    public function canBeFiled()
    {
        return $this->morphTo();
    }
}
