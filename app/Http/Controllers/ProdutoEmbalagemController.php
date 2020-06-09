<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoEmbalagem;
use Illuminate\Http\Request;

class ProdutoEmbalagemController extends Controller
{


    protected $request;
    private $repository;

    public function __construct(Request $request,ProdutoEmbalagem $produtoEmbalagem,Produto $produto)
    {
        $this->request = $request;
        $this->repository = $produtoEmbalagem;
        $this->relRepo = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtosEmbalagem =  $this->repository->latest()->paginate(5);
        return view('admin.pages.products_embalagem.index',compact('produtosEmbalagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos =  $this->relRepo->all();
        return view('admin.pages.products_embalagem.create',compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('idProduto','tipoEmbalagem','produto_id','quantidade');


        $produtoEmbalagem  = $this->repository->create($data);

         return redirect()->route('products_embalagem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtoEmbalagem = $this->repository->where('id_produto_embalagem',$id)->first();

        if(!$produtoEmbalagem)
        return redirect()->back();

        return view('admin.pages.products_embalagem.show',compact('produtoEmbalagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $produtoEmbalagem = $this->repository->where('id_produto_embalagem',$id)->first();

        if(!$produtoEmbalagem)
        return redirect()->back();

        $produtos =  $this->relRepo->all();

        return view('admin.pages.products_embalagem.edit',compact('produtoEmbalagem','produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produtoEmbalagem = $this->repository->where('id_produto_embalagem',$id)->first();

        if(!$produtoEmbalagem)
        return redirect()->back();

        $data = $request->all();
        $produtoEmbalagem->update($data);

        return redirect()->route('products_embalagem.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $produtoEmbalagem = $this->repository->where('id_produto_embalagem',$id)->delete();
        if(!$produtoEmbalagem)
        return redirect()->back();


        return redirect()->route('products_embalagem.index');
    }


    public function search(Request $request){
        $filters = $request->except('_token');
        $produtosEmbalagem = $this->repository->search(($request->filter));

        return view('admin.pages.products_embalagem.index',[
            'produtosEmbalagem'=>$produtosEmbalagem,
            'filters'=>$filters
        ]);

    }
}
