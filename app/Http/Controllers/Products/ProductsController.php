<?php


namespace App\Http\Controllers\Products;


use App\Http\Controllers\Controller;
use App\Pos\Services\Products\ProductServices;
use Illuminate\Http\Request;

Class ProductsController extends Controller
{
    private  $ProdcutServ;

    public function __construct()
    {
        $this->ProdcutServ = new ProductServices();
    }

    public function index()
    {
        $products = $this->ProdcutServ->getAll();

        return view('admin.products.index')
            ->with('products',$products);
    }


    public function add(Request $request)
    {

        if($this->ProdcutServ->add($request->all()))
        {
           return response()->json(['status'=>200 ]) ;
        }

       $errors =  $this->ProdcutServ->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function updatedView($id=0)
    {
        if($product =$this->ProdcutServ->getById($id))
           return response()->json(['status'=> 200,'data'=> $product ]) ;


         return response()->json(['status'=> 201]) ;
    }

    public function updatedProces(Request $request)
    {

        if($this->ProdcutServ->updated($request->all()))
            return response()->json(['status'=> 200]) ;


        $errors =  $this->ProdcutServ->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function search(Request $request)
    {

        $products = $this->ProdcutServ->search($request->all());

        return view('admin.products.index')
            ->with('products',$products);
    }

}