
@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-control" name="descricao" placeholder="Descrição:" value="{{$produto->descricao ?? old('descricao')}}"/>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="codigoFabricante" placeholder="codigofabricante:" value="{{$produto->codigofabricante ?? old('codigofabricante')}}"/>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success" style="border-radius:20px 20px;width:10%;color:#FFF;font-size:15pt;">Salvar</button>
</div>
