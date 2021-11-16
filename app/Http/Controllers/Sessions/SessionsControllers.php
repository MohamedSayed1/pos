<?php


namespace App\Http\Controllers\Sessions;


use App\Http\Controllers\Controller;
use App\Pos\Services\Sessions\SessionsServices;
use App\Pos\Services\Sessions\TransactionServices;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Cart;
use App\Pos\Paid;

class SessionsControllers extends Controller
{
    private $sessionSer ;
    private $transactionSer;

    public function __construct()
    {
        $this->sessionSer = new SessionsServices();
        $this->transactionSer = new TransactionServices();
    }

    public function index()
    {
        if(Auth()->user()->type == "admin")
        {
            $sessions = $this->sessionSer->getAll();
            return view('admin.session.pos')
                ->with('sessions',$sessions);
        }else{
            $sessions = $this->sessionSer->getToUser();
            return view('admin.session.pos')
                ->with('sessions',$sessions);
        }


    }


    public function open(Request $request)
    {
        if($this->sessionSer->open($request->all()))
        {
            Notify::success('تم الاضافه بنجاح', 'احسنت');
            return redirect()->back();
        }

        $errors = $this->sessionSer->errors();
        Notify::error($errors[0],'نأسف');

        return redirect()->back();

    }


    public function updated(Request $request)
    {
        if($this->sessionSer->updated($request->all()))
            return response()->json(['status'=> 200]) ;



        $errors =  $this->sessionSer->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function viewDetails($id = 0)
    {

        $session = $this->sessionSer->getBysessionId($id);
        if(!empty($session))
        {
            $pref = Paid::Details($id);
            return view('admin.session.viewDetails')
                ->with('pref',$pref)
                ->with('session',$session);
        }
        return response()->json(['status'=> 201]) ;

    }

    public function getDetialsRepo($id,$type)
    {
        $detials = $this->transactionSer->getByStatus($id,$type);

        return view('admin.session.detialsReport')
            ->with('detials',$detials)
            ->with('type',$type);
    }

    public function search(Request $request)
    {

        $sessions = $this->sessionSer->search($request->all());
        return view('admin.session.pos')
            ->with('sessions',$sessions);
    }



}