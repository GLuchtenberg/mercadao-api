<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 02/09/2018
 * Time: 19:34
 */

namespace App\Http\Services;


use App\Http\Contracts\ICanBeFiled;
use App\Http\Contracts\IFileSystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class FileEntriesService implements IFileSystem
{

    public static function store(ICanBeFiled $canBeFiled, Collection $data, File $file)
    {
        $fileName = $file->getClientOriginalName();


        return true;
    }

    private static function validate()
    {

    }
}