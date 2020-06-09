<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request,Produto $produto)
    {
        $this->request = $request;
        $this->repository = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos =  $this->repository->latest()->paginate(5);
        return view('admin.pages.products.index',compact('produtos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $data = $request->only('descricao','codigoFabricante');


       $produto  = $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->repository->where('id',$id)->first();

        if(!$produto)
        return redirect()->back();

        return view('admin.pages.products.show',compact('produto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->repository->where('id',$id)->first();

        if(!$produto)
        return redirect()->back();

        return view('admin.pages.products.edit',compact('produto'));
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
        $produto = $this->repository->where('id',$id)->first();

        if(!$produto)
        return redirect()->back();

        $data = $request->all();
        $produto->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->repository->where('id',$id)->first();
        if(!$produto)
        return redirect()->back();

        $produto->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $produtos = $this->repository->search(($request->filter));

        return view('admin.pages.products.index',[
            'produtos'=>$produtos,
            'filters'=>$filters
        ]);

    }
}
