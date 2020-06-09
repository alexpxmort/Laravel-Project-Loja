<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoEmbalagem extends Model
{

    protected $guarded = ['id_produto_embalagem'];
    protected $table = 'produto_embalagem';
    public $timestamps = false;
    protected $fillable = [
     'idProduto','tipoEmbalagem','produto_id','quantidade'
    ];

    public function search($filter = null){
        $results =$this->where(function($query) use ($filter){
             if($filter){
                 $query->where('idProduto','LIKE',"%{$filter}%");
             }
        })->paginate(5);

        return $results;
    }


}
