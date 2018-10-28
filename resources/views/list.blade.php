@extends('master')
@section('content')
    <div class="row" style="margin-top: 10px" >
        <div class="col-md-12">
            <a href="{{route('product.create')}}" class="btn btn-primary">Novo produto</a>
        </div>
        <div class="col-md-12">

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cod. Barra</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Unidade de medida</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr id="tr-{{$product->id}}">
                        <td> <img class="thumbnail" src="{{$product->image_path}}"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->manufacturer}}</td>
                        <td>{{$product->measurement_unit}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->description}}</td>
                        <td>R$ {{$product->price}}</td>
                        <td  scope="row">
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger" onclick=" deletar('{{$product->id}}')">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <th>
                        <td colspan="4" class="text-center">Nao encontramos produtos</td>
                    </th>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        td img{
            max-height: 80px;
        }
        tr:hover{
            background: #d4d4d4;
        }
    </style>
@append
@section('scripts')
    <script>
        function deletar (id){
            if(confirm('Are you sure?')){
                window.console.log(id);
            $.ajax({
                url: '/admin/product/'+id,
                type: 'post',
                data: {_method: 'delete'},
                success: function(result){
                    window.console.log(result);
                    $('#tr-'+result.id).remove();
                }
            });

            }else{
                return;
            }
            
        }

    </script>
@append