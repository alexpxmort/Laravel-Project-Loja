
@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-control" name="idProduto" placeholder="id Produto:" value="{{$produtoEmbalagem->idProduto ?? old('idProduto')}}"/>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="tipoEmbalagem" placeholder="Tipo Embalagem:" value="{{$produtoEmbalagem->tipoEmbalagem ?? old('tipoEmbalagem')}}"/>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="quantidade" placeholder="Quantidade:" value="{{$produtoEmbalagem->quantidade ?? old('quantidade')}}"/>
</div>
@if (isset($produtos)  && count($produtos) > 0)
<select id="produtos" name="produto_id">
@foreach($produtos as $produto)
<option value={{$produto->id}}>{{$produto->descricao}}</option>
@endforeach
</select>
@endif


<div class="form-group" style="margin-top: 10px;">
    <button type="submit" class="btn btn-success" style="border-radius:20px 20px;width:10%;color:#FFF;font-size:15pt;">Salvar</button>
</div>


