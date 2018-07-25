@extends('master')
@section('content')
    <div class="row" style="margin-top: 10px" >
        <div class="col-md-12">
            <a href="{{route('category.create')}}" class="btn btn-primary">Nova Categoria</a>
        </div>
        <div class="col-md-12">

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr id="tr-{{$category->id}}">
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td  scope="row">
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger" onclick=" deletar('{{$category->id}}')">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <th>
                        <td colspan="4" class="text-center">Nao encontramos categorias</td>
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
                url: '/admin/category/'+id,
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