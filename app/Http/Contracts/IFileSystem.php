<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 02/09/2018
 * Time: 19:35
 */

namespace App\Http\Contracts;



use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;

interface IFileSystem
{
    public static function store(ICanBeFiled $canBeFiled, Collection $data, File $file);
}