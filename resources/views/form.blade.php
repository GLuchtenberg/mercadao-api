@extends('master')
@section('content')

    @if(isset($product))
        {!! Form::open( ['url' => route('product.update',$product), 'method' => 'PUT','enctype'=>'multipart/form-data'] ) !!}
    @else
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @endif
            {!! csrf_field() !!}

            <div class="row" style="margin-top: 10px" >
                
                
                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="row">
                            @forelse($errors->all() as $erro)
                            <span style="color:red">
                                {{$erro}}
                            </span>
                            @empty
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       value="{{isset($product->name) ? $product->name  : null}}">
                            </div>
                            <div class="form-group" style="margin-left: 15px">
                                <label for="manufacturer">Fabricante</label>
                                <input type="text" class="form-control" name="manufacturer" id="manufacturer"
                                       value="{{isset($product->manufacturer) ? $product->manufacturer: null}}">
                            </div>
                            
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <!-- <input type="text" class="form-control" name="category" id="category"
                                       value="{{isset($product->category) ? $product->category: null}}"> -->
                                <select class="form-control" name="category" id="">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($product) && $category->id == $product->category_id) selected @endif >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-left: 15px">
                                <label for="price">Preço</label>
                                <input type="number" step="0.01" class="form-control" name="price" id="price"
                                       value="{{isset($product->price) ? $product->price: null}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="quantity">Quantidade</label>
                                <input type=""  class="form-control" name="quantity" id="quantity"
                                       value="{{isset($product->quantity) ? $product->quantity: null}}">
                            </div>
                            <div class="form-group"  style="margin-left: 15px">
                                <label for="measurement_unit">Unidade de medida</label>
                                <!-- <input type=""  class="form-control" name="measurement_unit" id="measurement_unit"
                                       value="{{isset($product->measurement_unit) ? $product->measurement_unit: null}}"> -->
                                <select name="measurement_unit" class="form-control" id="">
                                    <option value="KG">KG</option>
                                    <option value="Mg">MG</option>

                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="row">
                            
                            <div class="form-group"  >
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" id="description"
                                       value="{{isset($product->description) ? $product->description: null}}">
                            </div>
                            <div class="form-group"  style="margin-left: 15px"  >
                                <label for="barcode">Cod. barra</label>
                                <input type="text" class="form-control" name="barcode" id="barcode"
                                       value="{{isset($product->barcode) ? $product->barcode: null}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="row">  
                            <div class="form-group"  >
                            <label for="manufacturer ">Fabricante </label>
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" value="{{isset($product->manufacturer) ? $product->manufacturer: null}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="col-md-12">
                        @if(isset($product->image))
                            <div class="img-product-container">
                                <img src="{{$product->image_path}}"  class="img-responsive">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="image">Imagem</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
@endsection
@section('styles')
    <style>
        .img-product-container img{
            max-width: 100%;
        }
    </style>
@append
