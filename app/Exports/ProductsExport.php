<?php

namespace App\Exports;

use App\Pos\Model\Products\Products;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reports.exportProduct', [
            'product' => Products::all()
        ]);
    }
}
