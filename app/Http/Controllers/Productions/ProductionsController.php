<?php

namespace App\Http\Controllers\Productions;

use App\Http\Controllers\Controller;
use App\Model\Master\Buyer;
use App\Model\Master\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductionsController extends Controller
{
    public function index(){
        $buyers = Buyer::select('id', 'name')->get();
        $productionCat = ProductCategory::select('id', 'type')->get();
        return view('Production.index', ['buyers'=>$buyers, 'productCat'=>$productionCat]);
    }
    public function saveData(Request $request){
        $serialCount = count($request->serial);
        // foreach($request->serial as $serial){
        //     $data = new Product();
        //     $data->supplier_id = $request->supplierId;
        //     $data->product_category_id = $request->prdCatId;
        //     $data->product_name = $request->prdName;
        //     $data->created_by = Auth::user()->id;
        // }
        

         return response()->json([
            'result'=>$serialCount
            // 'res2'=>$request->supplierId
            ]);
    }
}
