@extends('admin.layouts.app')

@section('title','Editar Embalagem')

@section('content')
<h1> <a style="color:black;text-decoration:none;" href="{{route('products_embalagem.index')}}"><<</a>Editar  Embalagem {{$produtoEmbalagem->tipoEmbalagem ?? ''}}</h1>
    <form method="POST" action="{{route('products_embalagem.update',$produtoEmbalagem->id_produto_embalagem)}}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products_embalagem.partials.form')

    </form>
@endsection

