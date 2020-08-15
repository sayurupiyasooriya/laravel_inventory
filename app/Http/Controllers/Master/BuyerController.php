<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Master\Buyer;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Session;
// /home/sayuru/Projects/inventory/vendor/brian2694/laravel-toastr

class BuyerController extends Controller
{
    protected $buyerId;

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
        return view('Buyer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Buyer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Buyer();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact_person = $request->contact_person;
        $data->phone_number = $request->phone;
        $data->email = $request->email;
        $data->flag = $request->status;
        $data->modified_by = Auth::user()->id;

        if($data->save()){
            Session::flash('success', 'Buyer Created Successfully');
            return redirect()->route('buyer.index');
        }else{
            Session::flash('error', 'Buyer Creating Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $this->buyerId = $id;
        $data = Buyer::where('id', $id)->get();
        if($data){
            return view('Buyer.view', compact('data'));
        }
    }

    public  function getBuyerName(){
        
        $data = Buyer::where('id', $this->buyerId)->get();
        foreach ($data as $buyers) {
            $buyerName = $buyers['name'];
        }
        return $buyerName ?? '';
    }

    public function getTableData(){
        $data = Buyer::whereIn('flag', [0, 1])->get();
        return  DataTables::of($data)
         ->addColumn('action', function(Buyer $data){
            $url_edit = url('master/buyer/'.$data->id.'/edit');
            $url_view = url('master/buyer/'.$data->id.'/view');
            $url = url('master/buyer/'.$data->id);
            $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
            $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='delete'><i class='nav-icon fas fa-trash'></i></button>";
            $view = "<a class='btn btn-action btn-primary' href='".$url_view."' title='Edit'><i class='nav-icon fas fa-eye'></i></a>";
            return $view."".$edit."".$delete;

         })
        ->rawColumns(['action'])
        ->make(true);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buyer::where('id', $id)->get();
        if($data){
            return view('Buyer.update', compact('data'));
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
        $data =  Buyer::find($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact_person = $request->contact_person;
        $data->phone_number = $request->phone;
        $data->email = $request->email;
        $data->flag = $request->status;
        $data->modified_by = Auth::user()->id;

        if($data->save()){
            Session::flash('success', 'Buyer Updated Successfully');
            return redirect()->route('buyer.index');
        }else{
            Session::flash('error', 'Buyer Updating Error');
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  Buyer::find($id);
        $data->flag = "2";
        $data->modified_by = Auth::user()->id;
        if($data->save()){
            Session::flash('success', 'Buyer Removed Successfully');
            return new JsonResponse(["status"=>true]);
        }else{
            Session::flash('error', 'Buyer Removing Error');
            return new JsonResponse(["status"=>false]);
        }
    }
}
