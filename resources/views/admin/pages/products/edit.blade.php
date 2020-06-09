@extends('admin.layouts.app')

@section('title','Editar Produto')

@section('content')
<h1> <a style="color:black;text-decoration:none;" href="{{route('products.index')}}"><<</a>Editar  Produto {{$produto->descricao ?? ''}}</h1>
    <form method="POST" action="{{route('products.update',$produto->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products.partials.form')

    </form>
@endsection

