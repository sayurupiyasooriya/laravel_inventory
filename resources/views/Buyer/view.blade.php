<?php 
use App\Http\Controllers\Master\BuyerController;
$buyerId  = new BuyerController;
?>
@extends('layouts.backend.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $buyerId->getBuyerName( )}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-sm-12">
      <div class="col-sm-3" >
      <img src="{{asset('asset/dist/img/avatar.png')}}" alt="">
      </div>

    </div>    
  
  </div>
  <!-- /.content-wrapper -->
@endsection

