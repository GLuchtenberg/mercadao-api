<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 02/09/2018
 * Time: 21:31
 */

namespace App\Http\Repositories;


use App\Http\Contracts\ICanBeFiled;
use App\Product;

class ProductRepository extends BaseRepository implements ICanBeFiled
{
    const CONFIG_FILEPATH = 'products';

    protected $modelClass = Product::class;

    public function getAll($take = 12, $paginate = true)
    {
        return parent::getAll($take, $paginate);
    }

    public function getFiltered($filters,$take = 12, $paginate = true)
    {
        $filters = collect($filters);
        $query = $this->newQuery();

        if($filters->has('name')){
            $query->where('name','like','%'.$filters->get('name').'%');
        }

        return $this->doQuery($query,$take,$paginate);
    }

    public function getConfigFilePath()
    {
        return self::CONFIG_FILEPATH;
    }
}