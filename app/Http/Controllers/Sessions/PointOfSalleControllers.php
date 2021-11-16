<?php


namespace App\Http\Controllers\Sessions;


use App\Http\Controllers\Controller;
use App\Pos\Paid;
use App\Pos\Services\Products\ProductServices;
use App\Pos\Services\Sessions\SessionsServices;
use App\Pos\Services\Sessions\TransactionDetailsServices;
use App\Pos\Services\Sessions\TransactionServices;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;


class PointOfSalleControllers extends Controller
{

    private $product;

    public function __construct()
    {
        $this->product = new ProductServices();
    }

    public function Point()
    {
        if (Auth()->user()->open_seesion != null) {
            $products = $this->product->getWithPage();

            return view('admin.session.point', compact('products'));
        }

        Notify::error('يجب فتح الجلسه اولا ', ' خطا..ّ!');

        return redirect('dashboard/session');
    }

    public function index()
    {
        $products = $this->product->getWithPage();

        return view('admin.session.point', compact('products'));

    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $serach = $request->get('serach');
            $products = $this->product->getWithPage($serach);

            return view('admin.session.product', compact('products'));
        }
    }


    public function printReset($id = 0)
    {
         $detials = new  TransactionDetailsServices();
         $transaction = new TransactionServices();
         $getTotal = $transaction->getbyId($id);
         $bills = $detials->getByTrans($id);
         return view('admin.session.print', compact('bills','getTotal'));

    }

    public function returnView()
    {
        if(Auth()->user()->open_seesion != null)
        {
            $products = $this->product->getAll();
            return view('admin.session.return')
                ->with('products',$products);
        }

        return redirect('dashboard/session');
    }

    public function returnProcess(Request $request)
    {
        if(Paid::return($request->all()))
        {
            Notify::success('الارجاع بنجاح', 'احسنت');
            return redirect('dashboard/session/point/return');
        }

        Notify::error('برجاء اعاده المحاوله','نأسف');
        return redirect('dashboard/session/point/return');
    }

    public function prifSession($id = 0)
    {
        $pref = Paid::PinkBrief($id);
        return view('admin.session.priefSession')
            ->with('pref',$pref);
    }

    public function ProcessClose(Request $request)
    {
        $session = new SessionsServices();
        if($session->close($request->all()))
            return response()->json(['status'=> 200]) ;



        $errors =  $session->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;

    }


}