<?php


namespace App\Http\Controllers\Expenses;


use App\Http\Controllers\Controller;
use App\Pos\Services\Expenses\ExpensesServices;
use App\Pos\Services\Expenses\SplitExpensesServices;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;

class ExpensesControllers extends Controller
{
    private $exServices;

    private $split;

    public function __construct()
    {
        $this->exServices = new ExpensesServices();
        $this->split = new SplitExpensesServices();
    }

    public function index()
    {
        $expenses = $this->exServices->gets();
        $splits = $this->split->gets();

        return view('admin.expenses.record')
            ->with('expenses', $expenses)
            ->with('splits', $splits);


    }


    public function add(Request $request)
    {
        $data = $request->all();

        if ($this->exServices->add($data)) {
            Notify::success('تم الاضافه بنجاح', 'احسنت');
            return redirect()->back();
        }
        $errors = $this->exServices->errors();
        return redirect()->back()->with('error_code', 1)->withInput($request->all())->withErrors($errors);
    }

    public function updated(Request $request)
    {
        $data = $request->all();

        if ($this->exServices->updated($data)) {
            Notify::success('تم التعديل بنجاح', 'احسنت');
            return redirect()->back();
        }
        $errors = $this->exServices->errors();
        return redirect()->back()->with('error_code', 2)->withInput($request->all())->withErrors($errors);
    }


    public function del($id =0)
    {
        if($this->exServices->del($id))
        {
            Notify::success('تم الحذف بنجاح', 'احسنت');
            return redirect()->back();
        }

        $errors = $this->exServices->errors();
        Notify::error($errors[0],'نأسف');

        return redirect()->back();
    }

}