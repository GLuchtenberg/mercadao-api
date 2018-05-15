@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('product.create')}}" class="btn btn-primary">Novo produto</a>
        </div>
        <div class="col-md-8">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr id="tr-{{$product->id}}">
                        <td>{{$product->image}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td  scope="row">
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger" onclick="deletar('{{$product->id}}')">Excluir</a>
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

@section('scripts')
    <script>
        function deletar (id){

            window.console.log(id);
            $.ajax({
                url: '/product/'+id,
                type: 'post',
                data: {_method: 'delete'},
                success: function(result){
                    window.console.log(result);
                    $('#tr-'+result.id).remove();
                }
            });
        }

    </script>
@append