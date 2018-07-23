@extends('master')
@section('content')

    @if(isset($category))
        {!! Form::open( ['url' => route('category.update',$category), 'method' => 'PUT','enctype'=>'multipart/form-data'] ) !!}
    @else
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @endif
            {!! csrf_field() !!}
            <div class="row" style="margin-top: 10px" >
                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Nome</label>

                                <input type="text" id="name" class="form-control" name="name"
                                       value="{{isset($category->name) ? $category->name  : null}}">
                            </div>
                            
                            
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="row">
                            
                            <div class="form-group"  >
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" id="description"
                                       value="{{isset($category->description) ? $category->description: null}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </form>
@endsection
@section('styles')
    <style>
        .img-category-container img{
            max-width: 100%;
        }
    </style>
@append
{{--'name','description','image'--}}