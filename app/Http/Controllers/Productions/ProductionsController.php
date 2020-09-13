<?php

namespace App\Http\Controllers\Productions;

use App\Http\Controllers\Controller;
use App\Model\Master\Buyer;
use App\Model\Master\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Production;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;




class ProductionsController extends Controller
{
    public function create(){
        $buyers = Buyer::select('id', 'name')->where('flag', '1')->get();
        $productionCat = ProductCategory::select('id', 'type')->where('flag', '1')->get();
        return view('Production.create', ['buyers'=>$buyers, 'productCat'=>$productionCat]);
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

    public function view(){

        return view('Production.view');
    }

    public function getDataTable(){
        $items = DB::table("productions")
                ->join('buyers', 'buyers.id', '=', 'productions.supplier_id')
                ->join('product_categories', 'productions.product_category_id', '=', 'product_categories.id')
                ->select( 'product_name', (DB::raw('count(serial) as serialCount')),'buyers.name','product_categories.type as productCatName')
                ->groupBy( 'product_name', 'buyers.name','product_categories.type' )
                ->get();
        // get production count
        $test = json_decode($items, true);
        $count = count($test);
        

        // get production json
        for($i = 0; $i<$count; $i++ ){
        $data[]=[
            // 'ProductionId' => $test[$i]['id'],
            'ProductionName' =>  $test[$i]['product_name'],
            'SupplierName' => $test[$i]['name'],
            'ProductionCount' =>  $test[$i]['serialCount'],
            'ProductCatName' =>$test[$i]['productCatName'],
            
        ];
        }
        
        return  DataTables::of($data)->make();
        // return $count;
        // return $data;
        // return $items;
    }
    }
        

