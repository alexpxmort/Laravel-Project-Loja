@extends('admin.layouts.app')

@section("title","Detalhes da Embalagem {$produtoEmbalagem->tipoEmbalagem}");

@section('content')
<div style="background-color:#888;width:40%;border-color:gray;padding:40px;">
    <h1><a style="color:white;text-decoration:none;" href="{{route('products.index')}}"><<</a> Embalagem {{$produtoEmbalagem->tipoEmbalagem}}</h1>
    <hr style="background-color:black;">
<ul style="list-style-type:none;">
    <li><strong>id Produto:</strong> {{$produtoEmbalagem->idProduto}}   </li>
    <li><strong>Tipo Embalagem:</strong> {{$produtoEmbalagem->tipoEmbalagem}}</li>
    <li><strong>Quantidade:</strong> {{$produtoEmbalagem->quantidade}}</li>
</ul>
</div>
@endsection
