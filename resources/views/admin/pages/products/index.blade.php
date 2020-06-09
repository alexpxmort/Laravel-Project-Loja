
@extends('admin.layouts.app')

@section('title','Gestão de Produtos')

@section('content')
<h1>Produtos</h1>

<hr>

<form action="{{route('products.search')}}" method="POST" class="form form-inline">
    @csrf
    <input type="text" name="filter" id="filter" placeholder="Filtrar:" class="from-control"/>
    <input type="submit" class="btn btn-info" class="form-control" style="background-color:#888;" value="Pequisar"/>
</form>
<hr>
<a href="{{route('products.create')}}" class="btn btn-primary" style="background-color:#888;">Cadastrar
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
<br>
<a href="{{route('products_embalagem.index')}}" class="btn btn-primary" style="background-color:#888;">Cadastrar Embalagems
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
<br>
@if(isset($produtos) && count($produtos) > 0)
<table class="table table-bordered">
    <thead>
     <tr>
         <th>Descrição</th>
         <th>Código Fábricante</th>
         <th width="100">Ações</th>
     </tr>
    </thead>
    <tbody>
        <div>Total de Produtos: {{count($produtos)}} </div>
         @foreach($produtos as $produto)
             <tr>
                 <td>{{$produto->descricao}}</td>
                 <td>{{$produto->codigofabricante}}</td>
                 <td>
                     <a style="color:black;text-decoration:none;"  href="{{route('products.edit',$produto->id)}}">Editar</a>
                     <a style="color:black;text-decoration:none;" href="{{route('products.show',$produto->id)}}">Detalhes</a>
                 </td>
             </tr>
         @endforeach
    </tbody>
</table>
@else
No Products
@endif

@if (isset($filters))
{!!$produtos->appends($filters)->links()!!}
@else
{!!$produtos->links()!!}
@endif
@endsection

