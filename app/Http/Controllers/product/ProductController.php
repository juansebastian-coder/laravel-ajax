<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product\Mark;
use App\Models\Product\Product;
use Session;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    
//   ajax

public function listAll()
{

    $products=Product::with('mark')->paginate(1);
    return view('product.listAll', compact('products',$products));
    
}















    public function index()
    {
       // $products=Product::with('mark')->paginate(1);
    return view('product.index' /*compact('products',$products)*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $responseMarks=['Seleccione una marca'];
        $marks=Mark::select('id','name')->get();

        foreach ($marks as $key => $mark) {
            $responseMarks[$mark->id]=$mark->name;
        };
       
        return view('product.create', compact('responseMarks',$responseMarks));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        Product::create($request->all());
        Session::flash('save','Se ha guardado exitosamente el producto');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Product::findOrFail($id);
        return view('product.show',['products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responseMarks=['Seleccione una marca'];
        $marks=Mark::select('id','name')->get();

        foreach ($marks as $key => $mark) {
            $responseMarks[$mark->id]=$mark->name;
        };

        $products=Product::findOrFail($id);

        return view('product.edit',['responseMarks'=>$responseMarks,
        'products'=>$products]);



        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    { 
        try {
            $product=Product::findOrFail($id);
            $product->fill($request->all())->save();
            Session::flash('update','Se ha editado exitosamente el producto');
            return redirect('products');
        } catch (\Throwable $th) {
            return $th;
        }
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        Session::flash('delete','Se ha eliminado exitosamente el producto');
        return redirect('products');


    }
}
