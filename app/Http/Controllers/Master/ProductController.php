<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Master\ProductCategory;
use Session;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;



use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Product.indexCategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('Product.createCategory');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ProductCategory();
        $data->type = $request->catogary;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Session::flash('success', 'Product  Catogary Created Successfully');
            return redirect()->route('product.index');
        }else{
            Session::flash('error', 'Product  Catogary Creating Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductCategory::where('id', $id)->get();
        if($data){
            return view('Product.updateCategory', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  ProductCategory::find($id);
        $data->type = $request->type;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            Session::flash('success', 'Product Catogery Updated Successfully');
            return redirect()->route('product.index');
        }else{
            Session::flash('error', 'Product Catogery updating Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  ProductCategory::find($id);
        $data->flag = "0";
        if($data->save()){
            Session::flash('success', 'Product  Category Removed Successfully');
            return new JsonResponse(["status"=>true]);
        }else{
            Session::flash('error', 'Product  Category Removing Error');
            return new JsonResponse(["status"=>false]);
        }
    }

    public function getTableData(){
        $data = ProductCategory::whereNotIn('flag', [0])->get();
        return  DataTables::of($data)
        ->addColumn('action', function(ProductCategory $data){
            $url_edit = url('master/product/'.$data->id.'/edit');
            $url = url('master/product/'.$data->id);
            $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
            $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger ' title='delete'><i class='nav-icon fas fa-trash'></i></button>";
            return $edit."".$delete;

         })
        ->rawColumns(['action'])
        ->make(true);
        
    }
}
