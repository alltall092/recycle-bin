<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $p=Products::Paginate(5);

    return View('products',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
return View('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $p=new Products;
            $p->titulo=$request->titulo;
            $p->imagenes=$request->imagenes;
            $p->precio=$request->precio;
            $p->descripcion=$request->descripcion;
            $p->save();
            return response()->json(['success'=>'Product saved successfully.', 'data'=>$p]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $products=Products::find($id);

     return View('update',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {


    $products=Products::find($id);
       $products->titulo=$request->get('titulo');
        $products->imagenes=$request->get('imagenes');
        $products->precio=$request->get('precio');
         $products->descripcion=$request->get('descripcion');
         $products->save();
         return response()->json(['success'=>'Product saved successfully.', 'data'=>$products]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $p = Products::find($id);
        

        $p->delete();
        //return redirect()->back();
        return response()->json(['message' => 'Item deleted successfully','success'=>$p]);

    }
    public function trash(){
       $trash=Products::onlyTrashed()->orderBy("id", "desc")->paginate();

         return View('trashed',compact('trash'));
    }

public function restore(){
$restore=Products::withTrashed()->find(request()->id);
if($restore==null){
    abort(404);
}
$restore->restore();
return redirect()->back();





}


}
