
@extends('admin.layouts.app')

@section('title','Gestão de Embalagens')

@section('content')
<h1>Embalagens</h1>

<hr>

<form action="{{route('products.search')}}" method="POST" class="form form-inline">
    @csrf
    <input type="text" name="filter" id="filter" placeholder="Filtrar:" class="from-control"/>
    <input type="submit" class="btn btn-info" class="form-control" style="background-color:#888;" value="Pequisar"/>
</form>
<hr>
<a href="{{route('products_embalagem.create')}}" class="btn btn-primary" style="background-color:#888;">Cadastrar
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>

@if(isset($produtosEmbalagem) && count($produtosEmbalagem) > 0)
<table class="table table-bordered">
    <thead>
     <tr>
         <th>idProduto</th>
         <th>Tipo Embalagem</th>
         <th>Quantidade</th>
         <th width="100">Ações</th>
     </tr>
    </thead>
    <tbody>
        <div>Total de Embalagens: {{count($produtosEmbalagem)}} </div>
         @foreach($produtosEmbalagem as $produtoEmbalagem)
             <tr>
                 <td>{{$produtoEmbalagem->idProduto}}</td>
                 <td>{{$produtoEmbalagem->tipoEmbalagem}}</td>
                 <td>{{$produtoEmbalagem->quantidade}}</td>
                 <td>
                     <a style="color:black;text-decoration:none;"  href="{{route('products_embalagem.edit',$produtoEmbalagem->id_produto_embalagem)}}">Editar</a>
                     <a style="color:black;text-decoration:none;"  href="{{route('products_embalagem.show',$produtoEmbalagem->id_produto_embalagem)}}">Detalhes</a>

                 </td>
             </tr>
         @endforeach
    </tbody>
</table>
@else
No Embalagens
@endif

@if (isset($filters))
{!!$produtosEmbalagem->appends($filters)->links()!!}
@else
{!!$produtosEmbalagem->links()!!}
@endif
@endsection

