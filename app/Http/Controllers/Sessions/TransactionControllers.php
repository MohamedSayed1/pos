<?php


namespace App\Http\Controllers\Sessions;


use App\Http\Controllers\Controller;
use App\Pos\Services\Sessions\TransactionServices;
use Illuminate\Http\Request;

class TransactionControllers extends Controller
{
    private $tranSer;

    public function __construct()
    {
        $this->tranSer = new TransactionServices();
    }

    public function index()
    {
        return view('admin.session.expenses');
    }

    public function expenses(Request $request)
    {
        if($this->tranSer->expenses($request->all()))
             return response()->json(['status'=>200 ]) ;


        $errors =  $this->tranSer->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }
}