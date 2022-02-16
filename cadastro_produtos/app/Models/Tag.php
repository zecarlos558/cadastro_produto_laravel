<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    protected static function relatorioAnalitico()
    {
        return DB::table('product_tag')
        ->rightJoin('products', 'product_tag.product_id', '=', 'products.id')
        ->rightJoin('tags', 'product_tag.tag_id', '=', 'tags.id')
        ->select(DB::raw('tags.id as idTag,tags.name as nomeTag,products.id as idProduto,products.name as nomeProduto'))
        /*
        ->whereIn('clientes.id', [$request->cliente[0]])
        ->whereIn('plano_pagamentos.id', [$request->plano])
        ->whereBetween('dataVenda', [$request->dataInicio, $request->dataFim])
        */
        ->groupBy('tags.id','tags.name','products.id','products.name')
        ->orderBy('tags.name','asc')
        ->orderBy('products.name','asc')
        ;
    }

    protected static function relatorioSintetico()
    {
        return DB::table('product_tag')
        ->rightJoin('products', 'product_tag.product_id', '=', 'products.id')
        ->rightJoin('tags', 'product_tag.tag_id', '=', 'tags.id')
        ->select(DB::raw('tags.id as idTag,tags.name as nomeTag, count( products.id ) as quantidadeProduto'))
        /*
        ->whereIn('clientes.id', [$request->cliente[0]])
        ->whereIn('plano_pagamentos.id', [$request->plano])
        ->whereBetween('dataVenda', [$request->dataInicio, $request->dataFim])
        */
        ->groupBy('tags.id','tags.name')
        ->orderBy('tags.name','asc')
        ;
    }
}
