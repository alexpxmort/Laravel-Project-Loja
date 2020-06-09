@extends('admin.layouts.app')

@section('title','Cadastrar Novo Produto')

@section('content')
    <h1> <a style="color:black;text-decoration:none;" href="{{route('products.index')}}"><<</a> Novo Produto</h1>
    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">

        @include('admin.pages.products.partials.form')
    </form>

@endsection

