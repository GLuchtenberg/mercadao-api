<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;


class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $product = Product::find($this->route('product'));
        $barcode =!empty($product)? $product->barcode : null;

        return [
            'image' => 'file',
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'fabrication' => 'date',
            'expiration' => 'date',
            'barcode' => 'required|numeric|unique:products,barcode,'. $barcode.',barcode',
        ];
    }

    public function messages()
    {

        return [
            'image.required' => 'Deve ser feito o upload de uma imagem para o produto',
            'name.required' => 'nome é obrigatório',
            'name.min' => 'nome deve ter mais de 3 caracteres',
            'description.required' => 'description é obrigatório',
            'price.required' => 'preço é obrigatório',
            'category.required' => 'categoria é obrigatório',
            'fabrication.required' => 'data de fabricação é obrigatório',
            'expiration.required' => 'Data de validade é obrigatório',
            'barcode.required' => "Código de barras é obrigatório",
            'barcode.numeric' => "Código de barras deve ser numérico",
            'barcode.unique' => "Código de barras deve ser único",
        ];
    }

}
