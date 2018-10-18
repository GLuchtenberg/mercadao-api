<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->imagem ?? asset('product_placeholder.jpg'),
            'description' => $this->description,
            'category' => $this->category->name,
            'barcode'=> $this->barcode,
            'price' => number_format((float)$this->price, 2, '.', ''),
            'manufacturer' => $this->manufacturer,
            'measurement_unit'=> $this->measurement_unit,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
