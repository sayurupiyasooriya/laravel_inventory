@extends('layouts.backend.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Buyer</h1>
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
                <form role="form" method="POST" action="{{route('buyer.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Buyer Name">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Buyer Address">
                      </div>
                      <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person Name">
                      </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter e-mail Address">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                      </div>
                    
                  </div>
                  <!-- /.card-body -->
  
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

