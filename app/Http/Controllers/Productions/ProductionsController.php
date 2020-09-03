<?php

namespace App\Http\Controllers\Productions;

use App\Http\Controllers\Controller;
use App\Model\Master\Buyer;
use App\Model\Master\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Production;
// use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;



class ProductionsController extends Controller
{
    public function index(){
        $buyers = Buyer::select('id', 'name')->where('flag', '1')->get();
        $productionCat = ProductCategory::select('id', 'type')->where('flag', '1')->get();
        return view('Production.index', ['buyers'=>$buyers, 'productCat'=>$productionCat]);
    }
    public function saveData(Request $request){
        $serialCount = count($request->serial);
        for($i = 0; $i<count($request->serial); $i++){
            $products[] = [
                'supplier_id' => $request->supplierId,
                'product_category_id' =>$request->prdCatId,
                'product_name' =>$request->prdName,
                'serial' => $request->serial[$i],
                'created_by' =>Auth::user()->id
            ];
        }
        Production::insert($products);

        return $serialCount;

    }
        
}
