<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::all();
        $tagProdutos = array();
        foreach ($produtos as $key => $produto) {
            try {
                $tagProdutos[$key] = $produto->tags[0]->name;
            } catch (\Throwable $th) {
                $tagProdutos[$key] = '';
            }
        }
        return view('product.indexProduct', ['produtos' => $produtos,'tagProdutos' => $tagProdutos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('product.createProduct', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        $produto = new Product();
        $produto->name = $request->name;
        $produto->save();
        $tag = Tag::findOrFail($request->tag[0]);
        $tag->products()->attach($produto->id);

        return redirect()->route('indexProduct')->with('msg_alert','Produto salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Product::findOrFail($id);
        try {
            $tagProduto = $produto->tags[0]->name;
        } catch (\Throwable $th) {
            $tagProduto = '';
        }
        return view('product.showProduct', ['produto' => $produto,'tagProduto' => $tagProduto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Product::findOrFail($id);
        try {
            $tagProduto = $produto->tags[0]->id. '-'. $produto->tags[0]->name;
        } catch (\Throwable $th) {
            $tagProduto = '';
        }
        $tags = Tag::all();
        return view('product.editProduct',['produto' => $produto,'tags' => $tags,
                                            'tagProduto' => $tagProduto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $request->validated();

        $data = $request->all();
        $produto = Product::findOrFail($id);
        $tag = Tag::findOrFail($request->tag[0]);
        try {
            $tag->products()->detach($produto->tags[0]->id);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $tag->products()->attach($produto->id);

        Product::findOrFail($id)->update($data);

        return redirect()->route('indexProduct')->with('msg_alert','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('indexProduct')->with('msg_alert','Produto deletado com sucesso!');
    }

    public function detachProduto($idProduto,$idTag)
    {
        $tag = Tag::findOrFail($idTag);
        $tag->products()->detach($idProduto);

        return redirect()->route('indexTag')->with('msg_alert','Produto desvinculado com sucesso!');
    }
}
