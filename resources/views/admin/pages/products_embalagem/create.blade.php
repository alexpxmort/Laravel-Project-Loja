@extends('admin.layouts.app')

@section('title','Cadastrar Nova Emabalagem')

@section('content')
    <h1> <a style="color:black;text-decoration:none;" href="{{route('products_embalagem.index')}}"><<</a> Nova Emabalagem</h1>
    <form method="POST" action="{{route('products_embalagem.store')}}" enctype="multipart/form-data">

        @include('admin.pages.products_embalagem.partials.form')
    </form>

@endsection

