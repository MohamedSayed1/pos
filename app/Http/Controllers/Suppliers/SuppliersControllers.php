<?php


namespace App\Http\Controllers\Suppliers;


use App\Http\Controllers\Controller;
use App\Pos\Services\Suppliers\SupplierServices;
use Illuminate\Http\Request;

class SuppliersControllers extends Controller
{

    private $SupplierServ;
    public function __construct()
    {
        $this->SupplierServ = new SupplierServices();
    }

    // index view ()-> search and get 50 supplier

    public function index()
    {

        $suppliers = $this->SupplierServ->Suppliers();

        return view('admin.suppliers.index')
            ->with('suppliers',$suppliers);

    }

    public function add(Request $request)
    {
        if($data = $this->SupplierServ->add($request->all()))
            return response()->json(['status'=> 200,'id'=>$data[0],'value'=>$data[1]]);



        $errors =  $this->SupplierServ->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function updatedView($id = 0)
    {
        $supplier = $this->SupplierServ->getSupplier($id);
        if(!empty($supplier))
        {
            return view('admin.suppliers.updated')
                ->with('supplier',$supplier);
        }

        return response()->json(['status'=> 201]) ;
    }

    public function updatedProces(Request $request)
    {
        if($this->SupplierServ->updated($request->all()))
            return response()->json(['status'=> 200]);



        $errors =  $this->SupplierServ->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function search(Request $request)
    {
        $suppliers = $this->SupplierServ->Search($request->all());

        return view('admin.suppliers.index')
            ->with('suppliers',$suppliers);
    }
}