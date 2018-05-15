@extends('master')
@section('content')

@if(isset($product))
    {!! Form::open( ['url' => route('product.update',$product), 'method' => 'PUT'] ) !!}
@else
    <form action="{{route('product.store')}}" method="post">
@endif
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nome</label>

                    <input type="text" id="name" class="form-control" name="name" value="{{isset($product->name) ? $product->name  : null}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{isset($product->description) ? $product->description: null}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{isset($product->price) ? $product->price: null}}">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</form>
@endsection
{{--'name','description','price','image'--}}