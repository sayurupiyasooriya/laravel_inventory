@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inventry Product List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
          <div>
        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
          <thead>
          <tr>
            {{-- <th>Id</th> --}}
            <th>Name</th>
            <th>Product Category Name</th>
            <th>Supplier Name</th>
            <th>Count</th>      
          </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
   
</div>

            <!-- /.card -->
  @endsection
  @push('js')
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      processing:true,
      responsive:true,
      pagingType:'full_numbers',
      stateSave:false,
      scrollY:true,
      scrollX:true,
      ajax:"{{ url('productions/dataTable') }}",
      columns:[
        {data:'ProductionName', name:'ProductionName'},
        {data:'ProductCatName', name:'ProductCatName'},
        {data:'SupplierName', name:'SupplierName'},
        {data:'ProductionCount', name:'ProductionCount'}
              ]
    });
  });
</script>
@endpush

