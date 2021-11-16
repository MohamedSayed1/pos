<?php


namespace App\Http\Controllers;


use App\Pos\Services\Expenses\ExpensesServices;
use App\Pos\Services\Expenses\SplitExpensesServices;
use App\Pos\Services\Products\ProductServices;

class HomeControllers extends Controller
{

    private $expenses;
    private $prodcut;

    public function __construct()
    {
        $this->expenses = new SplitExpensesServices();
        $this->prodcut  = new ProductServices();
    }

    public function index()
    {
        if(Auth()->user()->type == "admin")
        {
            $prodcuts = $this->prodcut->getAll();
            $expenses = $this->expenses->gets();
            return view('admin.layout.index')
                ->with('expenses',$expenses)
                ->with('prodcuts',$prodcuts);
        }

            return redirect('dashboard/session');


    }
}