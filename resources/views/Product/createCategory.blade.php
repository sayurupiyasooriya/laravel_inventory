@extends('layouts.backend.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Product Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col">
              <!-- general form elements -->
              <div class="card card-primary">
                
                <!-- form start -->
                <form role="form" method="POST" action="{{route('product.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" class="form-control" id="catogary" name="catogary" placeholder="Enter Product Catogary">
                      </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div>
      </section>
  </div>
  <!-- /.content-wrapper -->
@endsection

