<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $table = 'produto';
    public $timestamps = false;
    protected $fillable = [
     'descricao','codigoFabricante'
    ];

    public function search($filter = null){
        $results =$this->where(function($query) use ($filter){
             if($filter){
                 $query->where('descricao','LIKE',"%{$filter}%");
             }
        })->paginate(5);

        return $results;
    }

}
