@extends('admin.layouts.app')

@section("title","Detalhes do produto {$produto->nome}");

@section('content')
<div style="background-color:#888;width:40%;border-color:gray;padding:40px;">
    <h1><a style="color:white;text-decoration:none;" href="{{route('products.index')}}"><<</a> Produto {{$produto->nome}}</h1>
    <hr style="background-color:black;">
<ul style="list-style-type:none;">
    <li><strong>Descrição:</strong> {{$produto->descricao}}   </li>
    <li><strong>Codigo Fabricante:</strong> {{$produto->codigofabricante}}</li>

</ul>
    <form method="POST" action="{{route('products.destroy',$produto->id)}}" >
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger" style="border-radius:20px 20px;">X</button>
    </form>
</div>
@endsection
