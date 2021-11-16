<?php


namespace App\Http\Controllers;


use App\Exports\ProductsExport;
use App\Pos\Services\Expenses\ExpensesServices;
use App\Pos\Services\Expenses\SplitExpensesServices;
use App\Pos\Services\Products\ProductServices;
use App\Pos\Services\Purchases\PurchasesDetailsServices;
use App\Pos\Services\Sessions\TransactionDetailsServices;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ReportsController extends Controller
{

    private $expServ;
    private $spilt;
    private $product;
    private $sesion;
    private $purch;


    public function __construct()
    {
        $this->expServ = new ExpensesServices();
        $this->spilt   = new SplitExpensesServices();
        $this->product = new ProductServices();
        $this->sesion  = new TransactionDetailsServices();
        $this->purch   = new PurchasesDetailsServices();
    }

    public function expenses()
    {
        $split_expenses = $this->spilt->gets();
        return view('admin.reports.expenses')
            ->with('split_expenses',$split_expenses);
    }


    public function expensesReport(Request $request)
    {
        $split_expenses = $this->spilt->gets();
        $expenses = $this->expServ->serch($request->all());
        $total =$expenses->sum('prices');
        return view('admin.reports.expenses')
            ->with('expenses',$expenses)
            ->with('split_expenses',$split_expenses)
            ->with('total',$total);
    }


    public function ProductReport(Request $request)
    {


        $search = $this->sesion->getByproductAndStatus($request->all());

        $product = $this->product->getById($request->get('product_id'));
        // transaction_details  ( status sale ) sales
        $sales   = $search->where('status','=','sale');
        $totalSales =  $sales->sum(function ($sales) {
            return $sales->paid * $sales->quantity;
        });

        $countSale = $sales->sum('quantity');
        // transaction_details ( status return ) return
        $returns = $search->where('status','=','return');
        $totalReturn =  $returns->sum(function ($returns) {
            return $returns->paid * $returns->quantity;
        });

        $countReturn = $returns->sum('quantity');
        // purchases_details ( purchases )
        $purch = $this->purch->Search($request->all());
        $totalPurch = $purch->sum(function ($purch) {
                return $purch->count * $purch->pruch_prices;
        });
        $totalExpected = $purch->sum(function ($purch) {
                return $purch->count * $purch->prices;
        });

        $countPurch = $purch->sum('count');

            return view('admin.reports.product')
                ->with('product',$product)
                ->with('sales',$sales)
                ->with('totalSales',$totalSales)
                ->with('returns',$returns)
                ->with('totalReturn',$totalReturn)
                ->with('purch',$purch)
                ->with('totalExpected',$totalExpected)
                ->with('totalPurch',$totalPurch)
                ->with('countSale',$countSale)
                ->with('countPurch',$countPurch)
                ->with('countReturn',$countReturn);

        // total && count
    }


    public function exportProudcts()
    {
        return Excel::download(new ProductsExport(),'product.xlsx');
    }


}