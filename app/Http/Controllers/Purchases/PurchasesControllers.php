<?php


namespace App\Http\Controllers\Purchases;


use App\Http\Controllers\Controller;
use App\Pos\Model\Purchases\Purchases;
use App\Pos\Services\Products\ProductServices;
use App\Pos\Services\Purchases\PurchasesDetailsServices;
use App\Pos\Services\Purchases\PurchasesServices;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;

class PurchasesControllers extends Controller
{

    private $product ;
    private $purch ;
    private $details;

    public function __construct()
    {
        $this->product = new ProductServices();
        $this->purch   = new PurchasesServices();
        $this->details = new PurchasesDetailsServices();
    }

    public function index()
    {
        $purchases = $this->purch->get();
        return view('admin.purchases.index')
            ->with('purchases',$purchases);
    }

    public function addView()
    {

        return view('admin.purchases.add');
    }

    public function addProces(Request $request)
    {
        if($this->purch->add($request->all()))
        {
            Notify::success('تم اضافه الفاتوره بنجاح', 'احسنت');
            return redirect('dashboard/purchases');
        }

        $errors = $this->purch->errors();
        Notify::error('هناك خطاء يرجاء املاء كل الحقول','نأسف');
        return redirect()->back()->withErrors($errors)->withInput($request->all());

    }

    public function returnProduct()
    {
        $products = $this->product->getAll();

        return response()->json(['status'=> 200,'data'=>$products]) ;
    }

    public function updatedView($id=0)
    {
        $purchas = $this->purch->getByID($id);
        if(!empty($purchas))
        {
            $detalis = $this->details->get($id);
            return view('admin.purchases.updated')
                ->with('purchas',$purchas)
                ->with('detalis',$detalis);
        }
        Notify::error('هناك خطاء يرجاء المحاوله مره اخري','نأسف');
        return redirect()->back();
    }

    public function show($id = 0)
    {

         $purchas = $this->purch->getByID($id);
        if(!empty($purchas))
        {
            $detalis = $this->details->get($id);
            return view('admin.purchases.invoices')
                ->with('purchas',$purchas)
                ->with('detalis',$detalis);
        }

    }

    public function search(Request $request)
    {

        $purchases = $this->purch->Search($request->all());
        return view('admin.purchases.index')
            ->with('purchases',$purchases);
    }


}