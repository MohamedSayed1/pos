<?php


namespace App\Http\Controllers\Expenses;


use App\Http\Controllers\Controller;
use App\Pos\Services\Expenses\SplitExpensesServices;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;


class SplitExpensesControlles extends Controller
{


    private $SplitExSer ;

    public function __construct()
    {
        $this->SplitExSer = new SplitExpensesServices();
    }

    public function index()
    {
         $expenses = $this->SplitExSer->gets();

        return view('admin.expenses.index')
            ->with('expenses',$expenses);
    }

    public function add(Request $request)
    {
        $data = $request->all();
      // return $this->SplitExSer->add($data);
        if($this->SplitExSer->add($data))
        {
            Notify::success('تم الاضافه بنجاح', 'احسنت');
            return redirect()->back();
        }
        $errors = $this->SplitExSer->errors();
        return redirect()->back()->with('error_code', 1)->withInput($request->all())->withErrors($errors);
    }

    public function updated(Request $request)
    {
        $data = $request->all();
        // return $this->SplitExSer->add($data);
        if($this->SplitExSer->updated($data))
        {
            Notify::success('تم التعديل بنجاح', 'احسنت');
            return redirect()->back();
        }
        $errors = $this->SplitExSer->errors();
        return redirect()->back()->with('error_code', 2)->withInput($request->all())->withErrors($errors);
    }


}